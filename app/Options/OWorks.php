<?php

namespace App\Options;

use Log1x\AcfComposer\Options;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Oworks extends Options
{
	public $name = 'Realizacje';
	public $slug = 'oworks';
	public $title = 'Realizacje';
	public $position = 103;
	public $capability = 'edit_posts';
	public $redirect = false;

	public function fields(): FieldsBuilder
	{
		$oworks = new FieldsBuilder('oworks');

		$oworks
			->addGroup('g_oworks', ['label' => ''])
			->addText('header', ['label' => 'Nagłówek'])
			->addWysiwyg('text', [
				'label'        => 'Treść',
				'tabs'         => 'all',
				'toolbar'      => 'full',
				'media_upload' => true,
			])
			->addLink('button', [
				'label'         => 'Przycisk',
				'return_format' => 'array',
			])
			->addRepeater('r_oworks', [
				'label'        => 'Zdjęcia (pierwsze jest duże)',
				'layout'       => 'table',
				'min'          => 1,
				'button_label' => 'Dodaj zdjęcie',
			])
			->addImage('image', [
				'label'         => 'Zdjęcie',
				'return_format' => 'array',
				'preview_size'  => 'thumbnail',
			])
			->endRepeater()
			->endGroup();

		return $oworks;
	}
}
