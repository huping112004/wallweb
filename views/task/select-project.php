<?php
/**
 * @var yii\web\View $this
 */
$this->title = yii::t('task', 'select project title');

use app\models\Project;
use yii\helpers\Url;

?>
<div class="box">
    <div class="search_box" style="padding-left: 40px">
        搜索: <input type="text" placeholder="请输入搜索内容" style="margin-left: 10px; height: 40px; width: 200px">
        <i class="search_icon"></i>
    </div>

    <!-- 最近发布环境 -->
    <div class="widget-box transparent">
        <div class="widget-header">
            <h4 class="lighter"><?= yii::t('w', 'conf_level_0') ?></h4>

            <div class="widget-toolbar no-border"><a href="javascript:;" data-action="collapse">
                    <i class="icon-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="widget-body">
            <div class="widget-main padding-6 no-padding-left no-padding-right">
                <?php foreach ($taskProjects as $project) { ?>

                        <a class="btn btn-inline btn-danger" style="min-width:120px;margin:auto auto 20px 40px;"
                           href="<?= Url::to("@web/task/submit?projectId={$project['id']}") ?>"><?= $project['name'] ?></a>
                    <?php } ?>

            </div>
        </div>
    </div>
    <!-- 最近发布end -->
    <!-- 测试环境 -->
    <div class="widget-box transparent">
        <div class="widget-header">
            <h4 class="lighter"><?= yii::t('w', 'conf_level_1') ?></h4>

            <div class="widget-toolbar no-border"><a href="javascript:;" data-action="collapse">
                    <i class="icon-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="widget-body">
            <div class="widget-main padding-6 no-padding-left no-padding-right">
                <?php foreach ($projects as $project) { ?>
                    <?php if ($project['level'] == Project::LEVEL_TEST) { ?>
                        <a class="btn btn-inline btn-info" style="min-width:120px;margin:auto auto 20px 40px;"
                           href="<?= Url::to("@web/task/submit?projectId={$project['id']}") ?>"><?= $project['name'] ?></a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- 测试环境 -->
    <br>
    <!-- 仿真环境 -->
    <div class="widget-box transparent">
        <div class="widget-header">
            <h4 class="lighter"><?= yii::t('w', 'conf_level_2') ?></h4>

            <div class="widget-toolbar no-border"><a href="javascript:;" data-action="collapse">
                    <i class="icon-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="widget-body">
            <div class="widget-main padding-6 no-padding-left no-padding-right">
                <?php foreach ($projects as $project) { ?>
                    <?php if ($project['level'] == Project::LEVEL_SIMU) { ?>
                        <a class="btn btn-inline btn-warning" style="min-width:120px;margin: auto auto 20px 40px;"
                           href="<?= Url::to("@web/task/submit?projectId={$project['id']}") ?>"><?= $project['name'] ?></a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- 仿真环境 -->
    <br>
    <!-- 线上环境 -->
    <div class="widget-box transparent">
        <div class="widget-header">
            <h4 class="lighter"><?= yii::t('w', 'conf_level_3') ?></h4>

            <div class="widget-toolbar no-border"><a href="javascript:;" data-action="collapse">
                    <i class="icon-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="widget-body">
            <div class="widget-main padding-6 no-padding-left no-padding-right">
                <?php foreach ($projects as $project) { ?>
                    <?php if ($project['level'] == Project::LEVEL_PROD) { ?>
                        <a class="btn btn-inline btn-success" style="min-width:120px;margin: auto auto 20px 40px;"
                           href="<?= Url::to("@web/task/submit?projectId={$project['id']}") ?>"><?= $project['name'] ?></a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- 模拟线上环境 -->
    <br>

</div>
<script>
    $(function () {
        var search_input = $(".search_box input"),
            search_content = $(".widget-main");
        $(search_input).on("keyup", function () {
            if (search_input.val() == '') {
                $(search_content).show();
            }
            $(".widget-main .btn-inline:contains(" + search_input.val().trim() + ")").show();
            $(".widget-main .btn-inline:not(:contains(" + search_input.val().trim() + "))").hide();


//第二中方法
//$(".search_content li").hide().filter(":contains("+ search_input.val().trim() +")").show();
        });
    });
</script>