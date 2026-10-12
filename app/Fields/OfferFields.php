<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class OfferFields extends Field
{
	public function fields(): array
	{
		$offer = new FieldsBuilder('offer_fields', [
			'title'    => 'Ustawienia oferty',
			'style'    => 'seamless',
			'position' => 'side',
		]);

		$offer
			->setLocation('post_type', '==', 'offer')
			->addImage('offer_icon', [
				'label'         => 'Ikona',
				'instructions'  => 'Dodaj ikonę (SVG, PNG) wyświetlaną nad tytułem oferty.',
				'return_format' => 'array',
				'preview_size'  => 'thumbnail',
				'allow_null'    => 1,
			]);

		$product = new FieldsBuilder('offer_product', [
			'title'    => 'Parametry produktu',
			'position' => 'normal',
		]);

		$product
			->setLocation('post_type', '==', 'offer')
			->addText('offer_label', [
				'label'        => 'Etykieta',
				'instructions' => 'Krótka etykieta pod nazwą produktu, np. „Standardowa”.',
			])
			->addRepeater('r_offer_params', [
				'label'        => 'Parametry',
				'layout'       => 'table',
				'button_label' => 'Dodaj parametr',
			])
			->addText('label', ['label' => 'Nazwa'])
			->addTextarea('value', [
				'label'     => 'Wartość',
				'rows'      => 2,
				'new_lines' => '',
			])
			->endRepeater();

		$single = new FieldsBuilder('offer_single', [
			'title'    => 'Strona produktu',
			'position' => 'normal',
		]);

		$wysiwyg = [
			'tabs'         => 'all',
			'toolbar'      => 'full',
			'media_upload' => true,
		];

		$single
			->setLocation('post_type', '==', 'offer')

			->addTab('Produkt', ['placement' => 'top'])
			->addImage('offer_image', [
				'label'         => 'Zdjęcie na stronie produktu',
				'instructions'  => 'Jeśli puste, użyty zostanie obraz wyróżniający.',
				'return_format' => 'array',
				'preview_size'  => 'medium',
			])
			->addText('offer_subtitle', ['label' => 'Podtytuł'])
			->addWysiwyg('offer_lead', array_merge(['label' => 'Opis'], $wysiwyg))
			->addRepeater('r_offer_points', [
				'label'        => 'Lista cech',
				'layout'       => 'table',
				'button_label' => 'Dodaj cechę',
			])
			->addText('text', ['label' => 'Treść'])
			->endRepeater()
			->addLink('offer_button1', ['label' => 'Przycisk #1', 'return_format' => 'array'])
			->addLink('offer_button2', ['label' => 'Przycisk #2 (dokument)', 'return_format' => 'array'])

			->addTab('Opis', ['placement' => 'top'])
			->addWysiwyg('offer_about', array_merge(['label' => 'Opis rozwiązania'], $wysiwyg))
			->addRepeater('r_offer_summary', [
				'label'        => 'W skrócie',
				'layout'       => 'table',
				'button_label' => 'Dodaj punkt',
			])
			->addText('text', ['label' => 'Treść'])
			->endRepeater()

			->addTab('Parametry', ['placement' => 'top'])
			->addWysiwyg('offer_spec_text', array_merge(['label' => 'Opis'], $wysiwyg))
			->addRepeater('r_offer_spec', [
				'label'        => 'Parametry techniczne',
				'layout'       => 'table',
				'button_label' => 'Dodaj parametr',
			])
			->addText('label', ['label' => 'Nazwa'])
			->addText('value', ['label' => 'Wartość'])
			->endRepeater()

			->addTab('Zużycie', ['placement' => 'top'])
			->addWysiwyg('offer_usage_text', array_merge(['label' => 'Opis'], $wysiwyg))
			->addRepeater('r_offer_usage', [
				'label'        => 'Zużycie materiału',
				'layout'       => 'table',
				'button_label' => 'Dodaj pozycję',
			])
			->addText('label', ['label' => 'Nazwa'])
			->addText('value', ['label' => 'Wartość'])
			->endRepeater()
			->addWysiwyg('offer_usage_note', array_merge(['label' => 'Uwaga pod listą'], $wysiwyg))

			->addTab('Zastosowania', ['placement' => 'top'])
			->addWysiwyg('offer_where_text', array_merge(['label' => 'Opis'], $wysiwyg))
			->addRepeater('r_offer_where', [
				'label'        => 'Zastosowania',
				'layout'       => 'table',
				'button_label' => 'Dodaj zastosowanie',
			])
			->addImage('icon', [
				'label'         => 'Ikona',
				'return_format' => 'array',
				'preview_size'  => 'thumbnail',
			])
			->addText('header', ['label' => 'Nagłówek'])
			->addWysiwyg('text', array_merge(['label' => 'Treść'], $wysiwyg))
			->endRepeater()

			->addTab('Dokumenty', ['placement' => 'top'])
			->addWysiwyg('offer_docs_text', array_merge(['label' => 'Opis'], $wysiwyg))
			->addImage('offer_docs_icon', [
				'label'         => 'Ikona dokumentu',
				'return_format' => 'array',
				'preview_size'  => 'thumbnail',
			])
			->addImage('offer_docs_download', [
				'label'         => 'Ikona pobierania',
				'return_format' => 'array',
				'preview_size'  => 'thumbnail',
			])
			->addRepeater('r_offer_docs', [
				'label'        => 'Dokumentacja produktu',
				'layout'       => 'table',
				'button_label' => 'Dodaj dokument',
			])
			->addText('header', ['label' => 'Nazwa'])
			->addText('text', ['label' => 'Opis (np. typ · rozmiar)'])
			->addFile('file', ['label' => 'Plik', 'return_format' => 'array'])
			->endRepeater();

		return [$offer, $product, $single];
	}
}
