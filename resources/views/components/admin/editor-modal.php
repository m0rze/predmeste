<div class="editor-modal deactivated">
    <div class="" style="width: 100%;padding: 2%">
        <div class="row">
            <div class="col-10"></div>
            <div class="col-2"><button class="close-modal btn btn-primary float-right mt-2 mr-2" type="button"><i class="fa fa-solid fa-circle-xmark"></i></button></div>
        </div>

        <div class="make-elements">
            <div class="mt-2 errors">

            </div>
            <div class="make-link deactivated">
                <div class="row mt-2">
                    <label for="link_url">УРЛ ссылки</label>
                    <input required id="link_url" class="link-url form-control" name="link_url" type="text">
                </div>
                <div class="row mt-2">
                    <label for="link_anchor">Якорь ссылки</label>
                    <input required id="link_anchor" class="link-anchor form-control" name="link_anchor" type="text">
                </div>
                <div class="row mt-4">
                    <button type="button" class="add-link btn btn-rnd btn-success">Добавить</button>
                </div>
            </div>
            <div class="upload-file deactivated">
                <form class="upload-file-form" action="#" method="post" enctype="multipart/form-data">
                    <div class="row mt-2">
                        <label class="file-label" for="file"></label>
                        <input required id="file" class="selected-file form-control" name="file" type="file">
                    </div>
                    <div class="row mt-2 file-title">
                        <label class="file-label" for="file_title">Заголовок файла (пустое, если по имени)</label>
                        <input id="file_title" class="selected-file form-control" name="file_title" type="text">
                    </div>
                    <div class="row mt-4">
                        <button type="submit" class="add-file btn btn-rnd btn-success">Добавить</button>
                    </div>
                    <input class="file-type" type="hidden" name="type" value="">
                </form>

            </div>
        </div>


    </div>
</div>
