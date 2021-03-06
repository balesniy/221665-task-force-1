<?php
/* @var $this yii\web\View */
/* @var $user frontend\models\Users */

use yii\helpers\Html;

$this->title = 'Task Force';
?>

<section class="content-view">
    <div class="user__card-wrapper">
        <div class="user__card">
            <img src="/img/man-hat.png" width="120" height="120" alt="Аватар пользователя">
            <div class="content-view__headline">
                <h1><?= Html::encode($user->name) ?></h1>
                <p><?= $user->city->title ?? '' ?>, <?= $user->getAge() ?> лет</p>
                <div class="profile-mini__name five-stars__rate">
                    <span></span><span></span><span></span><span></span><span class="star-disabled"></span>
                    <b><?= $user->getScore() ?? 0 ?></b>
                </div>
                <b class="done-task">Выполнил <?= $user->getTasks()->count() ?> заказов</b><b class="done-review">Получил <?= $user->getComments()->count() ?> отзывов</b>
            </div>
            <div class="content-view__headline user__card-bookmark user__card-bookmark--current">
                <span><?= Yii::$app->formatter->asRelativeTime($user->activity) ?></span>
                <a href="#"><b></b></a>
            </div>
        </div>
        <div class="content-view__description">
            <p><?= Html::encode($user->about) ?></p>
        </div>
        <div class="user__card-general-information">
            <div class="user__card-info">
                <h3 class="content-view__h3">Специализации</h3>
                <div class="link-specialization">
                    <?php foreach($user->categories as $category): ?>
                        <a href="#" class="link-regular"><?= $category->title ?></a>
                    <?php endforeach; ?>
                </div>
                <h3 class="content-view__h3">Контакты</h3>
                <div class="user__card-link">
                    <a class="user__card-link--tel link-regular" href="#"><?= Html::encode($user->phone) ?></a>
                    <a class="user__card-link--email link-regular" href="#"><?= Html::encode($user->email) ?></a>
                    <a class="user__card-link--skype link-regular" href="#"><?= Html::encode($user->skype) ?></a>
                </div>
            </div>
            <div class="user__card-photo">
                <h3 class="content-view__h3">Фото работ</h3>
                <?php foreach ($user->photos as $photo): ?>
                    <a href="#"><img src="<?= $photo->photo_src ?>" width="85" height="86" alt="Фото работы"></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="content-view__feedback">
        <h2>Отзывы<span>(<?= $user->getComments()->count() ?>)</span></h2>
        <div class="content-view__feedback-wrapper reviews-wrapper">
            <?php foreach ($user->comments as $feedback): ?>
                <div class="feedback-card__reviews">
                    <p class="link-task link">Задание <a href="#" class="link-regular">«<?= Html::encode($feedback->task->title) ?>»</a></p>
                    <div class="card__review">
                        <a href="#"><img src="/img/man-glasses.jpg" width="55" height="54"></a>
                        <div class="feedback-card__reviews-content">
                            <p class="link-name link"><a href="#" class="link-regular"><?= Html::encode($feedback->task->customer->name) ?></a></p>
                            <p class="review-text">
                                <?= Html::encode($feedback->text) ?>
                            </p>
                        </div>
                        <div class="card__review-rate">
                            <p class="five-rate big-rate"><?= $feedback->score ?><span></span></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="connect-desk">
    <div class="connect-desk__chat">

    </div>
</section>

