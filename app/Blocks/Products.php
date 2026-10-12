<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionBackgrounds;
use App\Support\SectionClasses;

class Products extends Block
{
	public $name = 'Produkty';
	public $description = 'products';
	public $slug = 'products';
	public $category = 'formatting';
	public $icon = 'products';
	public $keywords = ['produkty', 'oferta'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
	];

	public function fields()
	{
		$products = new FieldsBuilder('products');

		$products
			->setLocation('block', '==', 'acf/products') // ważne!
			/*--- FIELDS ---*/
			->addTab('Elementy', ['placement' => 'top'])
			->addMessage('Edycja', 'Produkty edytujemy w menu panelu administratora „Oferta”. Kategorie ofert tworzą grupy produktów.')
			->addGroup('g_products', ['label' => ''])
			->addText('header', ['label' => 'Nagłówek'])
			->addText('button_label', [
				'label' => 'Etykieta linku do produktu',
				'default_value' => 'Sprawdź produkt',
			])
			->endGroup()

			/*--- USTAWIENIA BLOKU ---*/

			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addText('section_id', [
				'label' => 'ID',
			])
			->addText('section_class', [
				'label' => 'Dodatkowe klasy CSS',
			])
			->addTrueFalse('nolist', [
				'label' => 'Brak punktatorów',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('wide', [
				'label' => 'Szeroka kolumna',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('gap', [
				'label' => 'Większy odstęp',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addSelect('background', [
				'label' => 'Kolor tła',
				'choices' => SectionBackgrounds::choices(),
				'default_value' => 'none',
				'ui' => 0, // Ulepszony interfejs
				'allow_null' => 0,
			]);

		return $products;
	}

	public function with(): array
	{
		$groups = [];

		$terms = get_terms([
			'taxonomy' => 'offer_category',
			'hide_empty' => true,
			'orderby' => 'term_id',
			'order' => 'ASC',
		]);

		foreach (is_wp_error($terms) ? [] : $terms as $term) {
			$query = new \WP_Query([
				'post_type' => 'offer',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'tax_query' => [[
					'taxonomy' => 'offer_category',
					'field' => 'term_id',
					'terms' => $term->term_id,
				]],
			]);

			$groups[] = [
				'name' => $term->name,
				'posts' => $query->posts,
			];

			wp_reset_postdata();
		}

		$fields = [
			'g_products' => get_field('g_products'),
			'groups' => $groups,

			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),

			'flip' => (bool) get_field('flip'),
			'wide' => (bool) get_field('wide'),
			'nomt' => (bool) get_field('nomt'),
			'gap' => (bool) get_field('gap'),
			'nolist' => (bool) get_field('nolist'),

			'background' => get_field('background') ?: 'none',
		];

		$fields['sectionClass'] = SectionClasses::fromMap($fields, [
			'flip' => 'order-flip',
			'wide' => 'wide',
			'nomt' => '!mt-0',
			'gap' => 'wider-gap',
			'nolist' => 'no-list',
		]);

		return $fields;
	}
}
