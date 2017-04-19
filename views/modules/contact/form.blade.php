{!! Form::open(['route' => 'contact.send', 'class' => 'contact-form']) !!}
    {!! Form::hidden('from', Request::path()) !!}

    @if (session()->has('contact_form_message'))
        <div class="alert alert-success">
            {!! session('contact_form_message') !!}
        </div>
    @endif
    @foreach (config('asgard.contact.config.fields') as $fieldName => $options)
        <div class="form-group{!! $errors->has($fieldName) ? ' has-error' : '' !!}">

            @if ($options['type'] == 'textarea')
                {!! Form::textarea($fieldName, old($fieldName), [
                    'class'       => 'form-control c-square c-theme input-lg contact-form-'.$fieldName,
                    'placeholder' => trans('contact::contacts.form.'.$fieldName)
                ]) !!}
            @elseif ($options['type'] == 'select')
                {!! Form::select($fieldName, $options['choices'], old($fieldName), [
                    'class'       => 'form-control c-square c-theme input-lg contact-form-'.$fieldName,
                    'placeholder' => trans('contact::contacts.form.'.$fieldName)
                ]) !!}
            @else
                {!! Form::text($fieldName, old($fieldName), [
                    'class'       => 'form-control c-square c-theme input-lg contact-form-'.$fieldName,
                    'placeholder' => trans('contact::contacts.form.'.$fieldName)
                ]) !!}
            @endif

            @if ($errors->has($fieldName))
                <span class="help-block">{!! $errors->first($fieldName) !!}</span>
            @endif

        </div>
    @endforeach

    <div class="row">
        <div class="col-md-6">

            <div class="form-group @if ($errors->has('g-recaptcha-response')) has-error @endif">
                {!! Captcha::display() !!}
                <span class="help-block">{!! $errors->first('g-recaptcha-response') !!}</span>
            </div>

        </div>
        <div class="col-md-6">
            {!! Form::submit(trans('contact::contacts.form.submit'), [
                'class' => 'btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold pull-right contact-form-submit'
            ]) !!}
        </div>
    </div>

{!! Form::close() !!}

@push('scripts')
{!! Captcha::script() !!}
@endpush
