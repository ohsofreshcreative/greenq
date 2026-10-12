<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionBackgrounds;
use App\Support\SectionClasses;

class Comparison extends Block
{
	public $name = 'Porównanie';
	public $description = 'comparison';
	public $slug = 'comparison';
	public $category = 'formatting';
	public $icon = 'columns';
	public $keywords = ['porownanie', 'zakladki'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
	];

	public function fields()
	{
		$comparison = new FieldsBuilder('comparison');

		$comparison
			->setLocation('block', '==', 'acf/comparison') // ważne!
			/*--- FIELDS ---*/
			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('g_comparison', ['label' => ''])

			->addText('header', ['label' => 'Nagłówek'])
			->addWysiwyg('text', [
				'label' => 'Treść',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => true,
			])

			->addRepeater('r_comparison', [
				'label' => 'Zakładki',
				'layout' => 'row',
				'min' => 1,
				'button_label' => 'Dodaj zakładkę',
			])
			->addText('tab', ['label' => 'Etykieta zakładki'])
			->addText('header', ['label' => 'Nagłówek kolumny'])
			->addText('badge', ['label' => 'Znacznik'])
			->addRepeater('steps', [
				'label' => 'Etapy',
				'layout' => 'table',
				'button_label' => 'Dodaj etap',
			])
			->addText('header', ['label' => 'Nazwa etapu'])
			->endRepeater()
			->addRepeater('params', [
				'label' => 'Parametry',
				'layout' => 'table',
				'button_label' => 'Dodaj parametr',
			])
			->addText('label', ['label' => 'Nazwa'])
			->addText('value', ['label' => 'Wartość'])
			->endRepeater()
			->endRepeater()

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

		return $comparison;
	}

	public function with(): array
	{
		$fields = [
			'g_comparison' => get_field('g_comparison'),
			'tabs' => get_field('g_comparison')['r_comparison'] ?? [],

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
