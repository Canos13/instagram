<!-- The form that will be used to create a new post. -->
<div class="create">
    <form action="/instagram/publish" method="post" enctype="miltipart/form-data">
        <textarea name="title" class="form-control mb-2" rows="3"></textarea>
        <div class="d-flex justify-content-between">
            <input type="file" class="w-50" name="image" accept="image/png, image/jpeg">
            <input type="submit" class="btn btn-primary w-25" value="publicar">
        </div>
    </form>
</div>