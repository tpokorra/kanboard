<div class="page-header">
    <h2><?= t('Email notifications') ?></h2>
</div>

<form method="post" action="<?= $this->url->href('user', 'notifications', array('user_id' => $user['id'])) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>

    <?= $this->form->checkbox('notifications_enabled', t('Enable email notifications'), '1', $notifications['notifications_enabled'] == 1) ?><br/>

    <?php if (! empty($projects)): ?>
        <p><?= t('I want to receive notifications only for those projects:') ?><br/><br/></p>

        <div class="form-checkbox-group">
        <?php foreach ($projects as $project_id => $project_name): ?>
            <?= $this->form->checkbox('projects['.$project_id.']', $project_name, '1', isset($notifications['project_'.$project_id])) ?><br/>
        <?php endforeach ?>
        </div>
    <?php endif ?>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'user', 'show', array('user_id' => $user['id'])) ?>
    </div>
</form>