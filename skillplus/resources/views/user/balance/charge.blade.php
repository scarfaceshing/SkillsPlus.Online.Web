@extends($user['vendor'] == 1?'user.layout.balancelayout':'user.layout_user.chargelayout')

@if($user['vendor'] == 1)
    @section('tab4','active')
@else
    @section('tab3','active')
@endif
@section('tab')
    <div class="h-20"></div>
    <div class="row ucp-top-panel">
        <div class="col-md-3 col-xs-12 tab-con">
            <div class="top-panel-box-balance sbox3 sbox3-s">
                <span>{{{ trans('main.account_charge') }}}</span>
                <label>{{{ currencySign() }}}{{{ $user['credit'] or 0 }}}</label>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 tab-con">
            @if($user['vendor'] == 1)
            <div class="top-panel-box-balance sbox3 sbox3-r">
                <span>{{{ trans('main.withdrawable_amount') }}}</span>
                <label>{{{ currencySign() }}}{{{ $user['income'] or 0 }}}</label>
            </div>
            @endif
        </div>
        <div class="col-md-6 col-xs-12 tab-con mart-10">
            <form method="post" action="/user/balance/charge/pay" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-2 tab-con ta-r">{{{ trans('main.gateway') }}}</label>
                    <div class="col-md-10">
                        <select name="type" class="form-control font-s">
                            <option value="paypal">paypal</option>
                            <option value="income">{{{ trans('main.income') }}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 tab-con ta-r">{{{ trans('main.amount') }}} ({{{ currencySign() }}})</label>
                    <div class="col-md-6 tab-con">
                        <input type="text" placeholder="$" name="price" class="form-control text-center" required>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" name="submit" class="btn btn-custom pull-left btn-100-p">{{{ trans('main.charge_account') }}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script></script>
@endsection

