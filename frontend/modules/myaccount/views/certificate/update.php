<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveField;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\modules\myaccount\Module;

$titleData = ($modelCertificate->isNewRecord) ? "Add" : "Update";
$this->title = $titleData . " Certificate";
?>
<section id="system-integrator-account" class="main-container">
    <div class="container">
        <?php echo $this->render("//layouts/_myaccountnav"); ?>
        <!-- Company Info Edit Section -->
        <div class="company-information-edit">
            <div class="row">
                <div class="sia-profile-logo">
                    <div class="sia-profile-top clearfix">
                        <div class="pic"><a href="#"><img alt="" src="<?=Module::getInstance()->company_logo?>"></a></div>
                        <div class="compname"><?=Module::getInstance()->company_name?><span>Service Provider</span></div>
                    </div>
                </div>
            </div>
            <?= common\widgets\Alert::widget() ?>
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="title lg"><span class="pyr-sprite sprite-certifications"></span> <?php echo $titleData; ?> Certificate</h2>
                </div>
            </div>

            <?php
            $form = ActiveForm::begin(['id' => 'updatecertificatefrm',
                        //'enableAjaxValidation' => true,
                        'enableClientValidation' => TRUE,
                        'options' => [
                            'class' => 'custom',
                            'role' => 'form',
                            'enctype' => "multipart/form-data",
                        ],
                        'fieldConfig' => [
                        //'options' => ['tag' => 'span']
                        ]
            ]);
            ?>

            <div class="block2 profile-view edit">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="item">
                            <span class="image"><span><img src="<?= Yii::getAlias('@getuploads') ?>/certificate/images/<?= $modelCertificate->logo_file_name . '.' . $modelCertificate->logo_ext ?>" alt=""></span></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="item">
                            <div class="form-group">
                                <div class="browse">
                                    <?php
                                    echo $form->field($modelCertificate, 'logo_file_name', [
                                        'template' => '{input}{hint}{error}',
                                    ])->fileInput(['class' => 'hide-input',
                                        'onchange' => 'jQuery(this).next().children().eq(0).val(jQuery(this).val());'
                                    ]);
                                    ?>
                                    <div class="show-input"><input type="text" class="form-control" id="uploadfile" placeholder="Browse Multiple Files" style="display:none;"><span class="action">Browse</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="item">
                            <span class="label">Certificate Title</span>
                            <?php
                            echo $form->field($modelCertificate, 'certificate_name', [
                                'template' => '<div class="form-group">{input}{error}</div>',
                            ])->textInput(['class' => 'form-control brd']);
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="item">
                            <span class="label">Rating</span>
                            <?php
                            echo $form->field($modelCertificate, 'rating', [
                                'template' => '<div class="form-group">{input}{error}</div>',
                            ])->dropDownList(Yii::$app->params['certificateRating'], ['class' => 'form-control', 'data-width' => "auto", 'data-style' => "select2", 'prompt' => 'Select Rating']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?php echo Html::submitButton('Save', ['class' => 'btn bg-green']) ?>
                </div>
            </div>
            <?php
            ActiveForm::end();
            ?>
        </div>
    </div>
</section>