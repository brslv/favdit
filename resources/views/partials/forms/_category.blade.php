<div class="form-group">
    {!! Form::text('title', null, ['class' => 'form-control', 'name' => 'title', 'placeholder' => '* Title']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('description', null, ['class' => 'form-control no-resize', 'placeholder' => 'Description...']) !!}
</div>

<div class="form-group">
    {!! Form::button($submitText, ['class' => 'btn btn-default', 'type' => "submit"]) !!}
</div>