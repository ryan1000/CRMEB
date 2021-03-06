{extend name="public/container"}
{block name="head_top"}
<link href="{__ADMIN_PATH}module/wechat/news/css/index.css" type="text/css" rel="stylesheet">
{/block}
{block name="content"}
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-title">
                <button type="button" class="btn btn-w-m btn-primary" onclick="window.location.href='{:Url('create',array('cid'=>$cid))}'">添加文章</button>
                <div class="ibox-tools">
                    <button class="btn btn-white btn-sm" onclick="location.reload()"><i class="fa fa-refresh"></i> 刷新</button>
                </div>
                <div style="margin-top: 2rem"></div>
                <div class="row">
                    <div class="m-b m-l">
                        <form action="" class="form-inline">
                            <select name="cid" aria-controls="editable" class="form-control input-sm">
                                <option value="">所有分类</option>
                                {volist name="cate" id="vo"}
                                <option value="{$vo.id}" {eq name="where.cid" value="$vo.id"}selected="selected"{/eq}>{$vo.html}{$vo.title}</option>
                                {/volist}
                            </select>
                            <div class="input-group">
                                <input type="text" name="title" value="{$where.title}" placeholder="请输入关键词" class="input-sm form-control"> <span class="input-group-btn"><button type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-search" ></i>搜索</button> </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <table class="footable table table-striped  table-bordered " data-page-size="20">
                    <thead>
                    <tr>
                        <th class="text-center" width="5%">id</th>
                        <th class="text-center" width="8%">分类</th>
                        <th class="text-center" width="10%">图片</th>
                        <th class="text-center" width="10%">标题</th>
                        <th class="text-center" width="30%">简介</th>
                        <th class="text-center" width="10%">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    {volist name="list" id="vo"}
                    <tr>
                        <td class="text-center">{$vo.id}</td>
                        <td class="text-center">{$vo.catename}</td>
                        <td class="text-center">
                            <img src="{$vo.image_input}"/>
                        </td>
                        <td>{$vo.title}</td>
                        <td class="text-center">
                            {$vo.synopsis}
                        </td>

                        <td class="text-center">
                            <a href="{:Url('create',array('id'=>$vo['id'],'cid'=>$cid))}">编辑</a>
                            <a href="javascript:void(0)" data-url="{:Url('delete',array('id'=>$vo['id']))}" class="del_news_one">删除</a>
                        </td>
                    </tr>
                    {/volist}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div style="margin-left: 10px">
    {include file="public/inner_page"}
</div>
{/block}
{block name="script"}
<script>

    $('.del_news_one').on('click',function(){
        window.t = $(this);
        var _this = $(this),url =_this.data('url');
        $eb.$swal('delete',function(){
            $eb.axios.get(url).then(function(res){
                console.log(res);
                if(res.status == 200 && res.data.code == 200) {
                    $eb.$swal('success',res.data.msg);
                    _this.parents('tr').remove();
                }else
                    return Promise.reject(res.data.msg || '删除失败')
            }).catch(function(err){
                $eb.$swal('error',err);
            });
        })
    });
</script>
{/block}
