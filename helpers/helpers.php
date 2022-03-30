<?php

if (!function_exists('dd')) {
    function dd($var)
    {
        echo '<pre><code>';
        \yii\helpers\VarDumper::dump($var);
        echo '</code></pre>';
        die();
    }
}
if (!function_exists('render_confirm')) {
    function render_confirm($url, $id, $variant = 'danger', $method = 'POST', $triggerBtn = null, $modalBtn = null, $modalTitle = null, $modalBody = null)
    {
        $triggerBtn = $triggerBtn ?? '<i class="fa-solid fa-trash"></i>';
        $modalBtn = $modalBtn ?? Yii::t('app', 'Delete');
        $modalTitle = $modalTitle ?? Yii::t('app', 'Are you sure?');
        $modalBody = $modalBody ?? Yii::t('app', 'Are you sure want to delete record?');

        $modalHtml = '<div class="modal fade" id="modal-' . $id . '" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">' . $modalTitle . '</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-left">' . $modalBody . '</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-' . $variant . '" onclick="document.getElementById(\'confirm-form-' . $id . '\').submit();">' . $modalBtn . '</button>
              </div>
            </div>
          </div>
        </div>';

        $triggerBtnHtml = '<button type="button" class="btn btn-sm btn-' . $variant . '" data-toggle="modal" data-target="#modal-' . $id . '">' . $triggerBtn . '</button>';
        $confirmForm = '<form action="' . $url . '" method="' . $method . '" id="confirm-form-' . $id . '">
            <input type = "hidden" name = "_csrf" value = "' . Yii::$app->request->getCsrfToken() . '" />
          </form>';

        return $triggerBtnHtml . $modalHtml . $confirmForm;
    }
}