<div class="container">
    <div class="col-md-8 offset-md-2">
        <h1>{{isset($workers)?'Edit':'New'}} Name</h1>
        <hr/>
        @if(isset($workers))
            {!! Form::model($workers,['method'=>'put','id'=>'frm']) !!}
        @else
            {!! Form::open(['id'=>'frm','files' => 'true']) !!}
        @endif
        <div class="form-group row required">
            {!! Form::label("name","Name",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("name",null,["class"=>"form-control".($errors->has('name')?" is-invalid":""),"autofocus",'placeholder'=>'Name']) !!}
                <span id="error-name" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("post","Post",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("post",null,["class"=>"form-control".($errors->has('post')?" is-invalid":""),'placeholder'=>'Post']) !!}
                <span id="error-post" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("DateEmp","Date of Employee",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::date("DateEmp",null,["class"=>"form-control".($errors->has('DateEmp')?" is-invalid":""),'placeholder'=>'Date of Employee']) !!}
                <span id="error-DateEmp" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("salary","Salary",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("salary",null,["class"=>"form-control".($errors->has('salary')?" is-invalid":""),'placeholder'=>'Salary']) !!}
                <span id="error-salary" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('parent_id', 'Select employee boss',['class' => 'col-form-label col-md-3 col-lg-2']) !!}
            <div class="col-md-8">
            {!! Form::text("parent_id",null,["class"=>"form-control".($errors->has('parent_id')?" is-invalid":""),'placeholder'=>'Boss name', "autocomplete"=>"off"]) !!}
            <ul class="boss-select list-group">
            </ul>
                <span id="error-parent_id" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-3 col-lg-2"></div>
            <div class="col-md-4">
                <a href="javascript:ajaxLoad('{{url('home')}}')" class="btn btn-danger btn-xs">
                    Back</a>
                {!! Form::button("Save",["type" => "submit","class"=>"btn btn-primary btn-xs"])!!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
