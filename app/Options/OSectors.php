<?php

namespace App\Options;

use Log1x\AcfComposer\Options;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Osectors extends Options
{
	public $name = 'Zastosowania w inwestycjach';
	public $slug = 'osectors';
	public $title = 'Zastosowania w inwestycjach';
	public $position = 102;
	public $capability = 'edit_posts';
	public $redirect = false;

	public function fields(): FieldsBuilder
	{
		$osectors = new FieldsBuilder('osectors');

		$osectors
			->addGroup('g_osectors', ['label' => ''])
			->addText('header', ['label' => 'Nagłówek'])
			->addWysiwyg('text', [
				'label'        => 'Treść',
				'tabs'         => 'all',
				'toolbar'      => 'full',
				'media_upload' => true,
			])
			->addRepeater('r_osectors', [
				'label'        => 'Zastosowania',
				'layout'       => 'table',
				'min'          => 1,
				'button_label' => 'Dodaj zastosowanie',
			])
			->addImage('icon', [
				'label'         => 'Ikona',
				'return_format' => 'array',
				'preview_size'  => 'thumbnail',
			])
			->addText('label', ['label' => 'Etykieta'])
			->addText('header', ['label' => 'Nagłówek'])
			->addWysiwyg('text', [
				'label'        => 'Treść',
				'tabs'         => 'all',
				'toolbar'      => 'full',
				'media_upload' => true,
			])
			->endRepeater()
			->endGroup();

		return $osectors;
	}
}
