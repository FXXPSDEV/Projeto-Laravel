@extends('adminlte::register')  

@section('body_class', 'register-page') 
@section('body')


<div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                           placeholder="{{ trans('Nome') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('Senha') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="{{ trans('Confirme sua senha') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('cpf') ? 'has-error' : '' }}">
                    <input type="text" id="cpf" name="cpf" class="form-control cpf" value="{{ old('cpf') }}"
                    placeholder="{{ trans('CPF') }}">
                    
                    @if ($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                </div>

                
                <div class="form-group has-feedback {{ $errors->has('rg') ? 'has-error' : '' }}">
                    <input type="text" name="rg" class="form-control" value="{{ old('rg') }}"
                           placeholder="{{ trans('RG') }}">
                    
                    @if ($errors->has('rg'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rg') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <input type="text" name="phone_with_ddd" id="phone_with_ddd" class="form-control phone" value="{{ old('phone') }}"
                           placeholder="{{ trans('Telefone') }}">
                    
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('adress') ? 'has-error' : '' }}">
                        <input type="text" name="adress" id="adress" class="form-control adress" value="{{ old('adress') }}"
                               placeholder="{{ trans('Endereço') }}">
                        
                        @if ($errors->has('adress'))
                            <span class="help-block">
                                <strong>{{ $errors->first('adress') }}</strong>
                            </span>
                        @endif
                    </div>
    

               <!--
						<form method="get" action=".">
							<div class="form-group">
								<label class="col-md-4 control-label col-xs-12" for="">Endereço</label>  
								<div class="">
									<input id="cep" name="cep" required="required" type="text"  placeholder="CEP" 
									class="form-control input-md" maxlength="9" value="">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for=""></label> 
								<div class="">
									<input id="rua" name="street" required="required" type="text" placeholder="Rua" class="form-control input-md ">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for=""></label>  
								<div class="">
									<input id="bairro" name="neighborhood" required="required" type="text" placeholder="Bairro" class="form-control input-md ">
								</div>
								<div class="">
									<input id="cidade" name="city" required="required" type="text" placeholder="Cidade" class="form-control input-md ">
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-4 control-label" for=""></label>  
								<div class="">
									<input id="uf" name="state" required="required" type="text" placeholder="Estado" class="form-control input-md ">
								</div>	
								<div class="">
									<input id="pais" name="nation" required="required" type="text" placeholder="País" class="form-control input-md ">
								</div>													
							</div>

						</form>
						-->
                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >{{ trans('adminlte::adminlte.register') }}</button>
            </form>
            <div class="auth-links">
                <a href="{{ url(config('adminlte.login_url', 'login')) }}"
                   class="text-center">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop


@section('page-script')
<script type="text/javascript">
	$(document).ready(() => {
    $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.phone').mask('0000-0000');
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpf').mask('000.000.000-00', { reverse: true });
    $('.cnpj').mask('00.000.000/0000-00', { reverse: true });
    $('.money').mask('000.000.000.000.000,00', { reverse: true });
    $('.money2').mask("#.##0,00", { reverse: true });
    $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            Z: {
                pattern: /[0-9]/, optional: true
            }
        }
    });
    $('.ip_address').mask('099.099.099.099');
    $('.percent').mask('##0,00%', { reverse: true });
    $('.clear-if-not-match').mask("00/00/0000", { clearIfNotMatch: true });
    $('.placeholder').mask("00/00/0000", {
        translation: {
            placeholder: "__/__/____"
        }
    });
    $('.placeholder2').mask("00/00/0000", {
        placeholder: "__/__/____"
    });
    $('.fallback').mask("00r00r0000", {
        translation: {
            r: {
                pattern: /[\/]/,
                fallback: '/'
            },
            placeholder: "__/__/____"
        }
    });
    $('.selectonfocus').mask("00/00/0000", { selectOnFocus: true });
});
</script>
@stop