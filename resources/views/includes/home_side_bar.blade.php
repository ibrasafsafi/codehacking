<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    @if($categories)
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-8">
                    <ul class="list-unstyled">
                        @foreach($categories as $category)

                            <li><a href="#">{{$category->name}}</a></li>

                        @endforeach
                    </ul>
                </div>

            </div>
            <!-- /.row -->
        </div>
@endif
<!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus
            laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>