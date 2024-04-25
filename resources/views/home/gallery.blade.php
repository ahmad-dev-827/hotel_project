<div class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>gallery</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($gallery as $galleries)
                <div class="col-md-3 col-sm-6">
                    <div class="gallery_img">
                        <figure>
                            <img style="height: 170px; width: 300px" src="/galleryImg/{{ $galleries->image }}"
                                alt="Img" />
                        </figure>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
