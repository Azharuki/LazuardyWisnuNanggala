<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pengaduan $pengaduan
 */
?>

<?php
$this->assign('title', __('Edit Pengaduan'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Pengaduan'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $pengaduan->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($pengaduan, ['type' => 'file']) ?>
    <div class="card-body">
        <?= $this->Form->control('tg_pengaduan') ?>
        <?= $this->Form->control('isi_laporan') ?>
        <?= $this->Html->image($pengaduan->foto, ['alt' => 'foto', 'style' => 'max-width:5px; max-height:5px;']) ?>
        <?= $this->Form->control('foto', ['type' => 'hidden']) ?>
        <?= $this->Form->control('images', ['type' => 'file']) ?>
        <?= $this->Form->control('status') ?>
        <?= $this->Form->control('petugas_id', ['options' => $petugas, 'class' => 'form-control']) ?>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pengaduan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pengaduan->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $pengaduan->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>