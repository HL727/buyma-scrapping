@extends("layouts.mypage")
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>DIORの商品リスト</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item">商品管理</li>
                        <li class="breadcrumb-item active">DIORの商品リスト</li>                                              
                    </ul>                    
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <button class="btn btn-warning btn-icon float-right" type="button" title="CSVダウンロード"  onclick="csv_down(4)"><i class="zmdi zmdi-download"></i></button>
                    <!-- <button class="btn btn-warning btn-icon float-right" type="button" title="出品"  onclick="exhibit_dior_product()" <?php if(Auth::user()->status != 'init')echo 'disabled';?>><i class="zmdi zmdi-upload"></i></button> -->
                    <button class="btn btn-success btn-icon float-right" type="button" title="商品追加"  data-toggle="modal" data-target="#defaultModal" <?php if(Auth::user()->status != 'init')echo 'disabled';?>><i class="zmdi zmdi-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover product_item_list c_table theme-color mb-0">
                                <thead>
                                    <tr>
                                        <th>画像</th>
                                        <th>商品名</th>
                                        <th data-breakpoints="md">商品詳細</th>
                                        <th data-breakpoints="xs">商品価格</th>  
                                        <th data-breakpoints="md">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td><img src="{{$product->product_img}}" width="48" alt="Product img"></td>
                                        <td style="white-space:normal"><h5>{{$product->product_name}}</h5></td>
                                        <td style="white-space:normal">
                                            <span class="text-muted">                                                 
                                                {{$product->product_comment}}                                       
                                            </span>
                                        </td>
                                        <td>¥<?=number_format($product->product_price , 0,".",",")?></td>                                        
                                        <td>                                            
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach           
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php //var_export($end_page)?>
                    <div class="card">
                        <div class="body"> 
                            <ul class="pagination pagination-primary m-b-0">
                            <?php
                            if($end_page < 8){
                                for($i = 1; $i < $end_page; $i++){
                            ?>
                                <li class="page-item <?php if($now_page == $i)echo 'active';?>"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=<?=$i?>"><?=$i?></a></li>
                                
                            <?php }
                            }else{
                                if($now_page < 8){
                                    for($i = 1; $i < 6; $i++){
                                        ?>
                                            <li class="page-item <?php if($now_page == $i)echo 'active';?>"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=<?=$i?>"><?=$i?></a></li>                                            
                                    <?php } ?>
                                    
                                    <?php if($end_page >= 7){?>
                                        <li class="page-item"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=6">...</a></li>
                                        <li class="page-item"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=<?=($end_page)?>"><?=($end_page)?></a></li>
                                        <li class="page-item"><a class="page-link" href="./dior?page=<?=($now_page + 7)?>&keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>"><i class="zmdi zmdi-arrow-right"></i></a></li>
                                    <?php } else{?>
                                        <li class="page-item"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=6?>">6</a></li>
                                        <li class="page-item"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=7?>">7</a></li>
                                    <?php }?>

                                    <?php
                                }else if($now_page > $end_page - 7){
                                    ?>
                                    <li class="page-item"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=<?=($end_page - 7)?>"><i class="zmdi zmdi-arrow-left"></i></a></li>
                                    <?php
                                    for($i = $end_page - 6; $i < $end_page + 1; $i++){
                                        ?>
                                            <li class="page-item <?php if($now_page == $i)echo 'active';?>"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=<?=$i?>"><?=$i?></a></li>                                            
                                    <?php } ?>                                    
                                    <?php
                                }else{?>

                                    <li class="page-item"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=<?=($now_page - 7)?>"><i class="zmdi zmdi-arrow-left"></i></a></li>
                                    
                                    <li class="page-item"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=1">1</a></li>
                                    <li class="page-item"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=<?=($now_page-2)?>">...</a></li>                                            
                                    <li class="page-item"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=<?=($now_page-1)?>"><?=($now_page-1)?></a></li>
                                    <li class="page-item active"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=<?=($now_page)?>"><?=($now_page)?></a></li>
                                    <li class="page-item"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=<?=($now_page+1)?>"><?=($now_page+1)?></a></li>  
                                    <li class="page-item"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=<?=($now_page+2)?>">...</a></li>                                      
                                    
                                    <?php if($end_page >= ($now_page + 3)){?>
                                        <li class="page-item"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=<?=($end_page)?>"><?=($end_page)?></a></li>
                                        <li class="page-item"><a class="page-link" href="./dior?page=<?=($now_page + 7)?>&min=<?=$min?>&max=<?=$max?>&keyword=<?=$keyword?>"><i class="zmdi zmdi-arrow-right"></i></a></li>
                                    <?php } else{?>
                                        <li class="page-item"><a class="page-link" href="./dior?keyword=<?=$keyword?>&min=<?=$min?>&max=<?=$max?>&page=<?=($now_page+3)?>"><?=($now_page+3)?></a></li>
                                    <?php }?>
                            <?php 
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">検索条件設定画面</h4>
            </div>
            <div class="modal-body"> 
                <div class="row" style="margin:5px 5px 5px 5px">
                    <div class="col-lg-4 col-md-4 col-sm-4"> ワード</div>
                    <div class="col-lg-8 col-md-8 col-sm-8"><input type="text" class="form-control" id="keyword" name="keyword" value="<?=$keyword?>"></div>
                </div>
                <!-- <div class="row" style="margin:5px 5px 5px 5px">
                    <div class="col-lg-4 col-md-4 col-sm-4"> 価格帯</div>
                    <div class="col-lg-4 col-md-4 col-sm-4"><input type="number" class="form-control" id="min_price" name="min_price" value="<?=$min?>"></div>
                    <div class="col-lg-4 col-md-4 col-sm-4"><input type="number" class="form-control" id="max_price" name="max_price" value="<?=$max?>"></div>
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect" onclick="add_dior_product()">追加</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">キャンセル</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    function add_dior_product(){
        $("#defaultModal").modal('hide');
        let keyword = $("#keyword").val(), min = $("#min_price").val(), max = $("#max_price").val();
        $.ajax({
            url: '{{env('API_URL')}}/api/v1/dior?sel={{Auth::user()->id}}',
            type: 'get',
            data: {
                keyword: $("#keyword").val(),
            },
            success: function() {
            }
        });
        let queries = { keyword, min, max }, url = './dior', querystring = '';
        let keys = Object.keys(queries);
        for (let i = 0; i < keys.length; i++) {
            if (queries[keys[i]] !== '') {
                querystring += `${keys[i]}=${queries[keys[i]]}&`
            }
        }
        if (querystring !== '') {
            url += '?' + querystring;
            url = url.slice(0, -1)
        }

        document.location.href = './dior'
    }

    function exhibit_dior_product(){
        $.ajax({
            url: '{{env('API_URL')}}/api/v1/dior',
            type: 'post',
            data: {
                user_id: '{{Auth::user()->id}}'
            },
            success: function() {
                window.location.reload()
                
            }
        });
    }
</script>
@endpush
