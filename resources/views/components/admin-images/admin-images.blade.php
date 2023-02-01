<div>
    <div class="dashboard__sub-section">
        <h3 class="dashboard__sub-section__heading"> მთავარი გვერდი </h3>

        <form action="/store" method="post" enctype="multipart/form-data">
            @csrf
            <label for="uploadImage">სურათი</label>
            <input type="file" name="image" class="form-control-file" id="uploadImage">
            <button type="submit" class="btn btn-success">შეცვლა</button>
        </form>
    </div>

    <div class="dashboard__sub-section">
        <h3 class="dashboard__sub-section__heading"> ჩვენს შესახებ </h3>

        <form action="/store" method="put" enctype="multipart/form-data">
            @csrf
            <label for="uploadImage">სურათი</label>
            <input type="file" name="image" class="form-control-file" id="uploadImage">
            <button type="submit" class="btn btn-success">შეცვლა</button>
        </form>
    </div>

    <div class="dashboard__sub-section">
        <h3 class="dashboard__sub-section__heading"> გალერეა </h3>

        <form action="/store" method="put" enctype="multipart/form-data">
            @csrf
            <label for="changeImage_1">
                <img class="gallery-img" src="/assets/images/sameba.jpg" alt="">
            </label>
            <input hidden type="file" name="image" class="form-control-file" id="changeImage_1">
            <button type="submit" class="btn btn-success">შეცვლა</button>
            <button type="submit" class="btn btn-danger">წაშლა</button>
        </form>

        <form action="/store" method="put" enctype="multipart/form-data">
            @csrf
            <label for="uploadImage">სურათი</label>
            <input type="file" name="image" class="form-control-file" id="uploadImage">
            <button type="submit" class="btn btn-primary">დამატება</button>
        </form>
    </div>
</div>
