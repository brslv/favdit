<div class="form-group">
    {!! Form::text('title', null, ['class' => 'form-control', 'name' => 'title', 'placeholder' => '* Title']) !!}
</div>

<div class="form-group">
    {!! Form::text('link', null, ['class' => 'form-control', 'name' => 'link', 'placeholder' => '* Link']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('description', null, ['class' => 'form-control no-resize', 'placeholder' => 'Description...']) !!}
</div>

<div class="form-group">
    @if (count($categories) > 0)
        <select name="category_id" class="form-control">
            @if (isset($favCategoryId) && $favCategoryId != null)
                <option value="{{ $favCategoryId }}">{{ $fav->category->title }}</option>
            @endif

        	<option value="0">No category</option>

            @foreach($categories as $category)
                @if (isset($favCategoryId))
                    @if ($category->id != $favCategoryId)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endif
                @else
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endif
            @endforeach
        </select>
    @else
        <div class="alert alert-info">
            {!! message('user_has_no_categories_to_choose_from') !!}
        </div>
    @endif
</div>

<div class="alert alert-warning">
    {!! message('instruct_create_category_on_new_fav') !!}
</div>

<div class="form-group">
    <input type="text" class="form-control" name="new_category" placeholder="Create new category"/>
</div>

<div class="form-group">
    {!! Form::button($submitText, ['class' => 'btn btn-default', 'type' => "submit"]) !!}
</div>