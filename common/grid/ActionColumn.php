<?php

namespace app\common\grid;

/**
 *
 */
class ActionColumn extends \yii\grid\ActionColumn{

	public $template = '{update} {delete}';
}