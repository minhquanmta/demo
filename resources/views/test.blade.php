@extends('layout')
@section('products')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <td>
                <p>Name</p>
            </td>
            <td align="center">
                <p>Price</p>
            </td>
            <td align="center">
                <p><button type="button" onclick="xxx()" id="btn1">+</button>
                    <input style="width: 50px; text-align: center" value="xxx">
                    <button type="button" value="btn value">-</button></p>
            </td>
            <td align="center">
                <input id="input123" style="width: 50px; text-align: center" readonly value="">
            </td>
            <td align="center">
                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
            </td>
        </tr>
    </table>
    @endsection
<script type="text/javascript">
    function xxx() {
        alert("dfsfs");
        $(this).val($('#btn1').next().val());
    }
</script>