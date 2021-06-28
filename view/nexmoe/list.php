<?php view::layout('layout')?>
<?php 
function file_ico($item){
  $ext = strtolower(pathinfo($item['name'], PATHINFO_EXTENSION));
  if(in_array($ext,['bmp','jpg','jpeg','png','gif'])){
  	return "image";
  }
  if(in_array($ext,['mp4','mkv','webm','avi','mpg', 'mpeg', 'rm', 'rmvb', 'mov', 'wmv', 'mkv', 'asf'])){
  	return "ondemand_video";
  }
  if(in_array($ext,['ogg','mp3','wav','flac'])){
  	return "audiotrack";
  }
  return "insert_drive_file";
}
?>

<?php view::begin('content');?>
	
<div class="mdui-container-fluid">
<?php if($head):?>
<div class="mdui-typo" style="padding: 20px;">
	<?php e($head);?>
</div>
<?php endif;?>
<style>
.thumb .th{
	display: none;
}
.thumb .mdui-text-right{
	display: none;
}
.thumb .mdui-list-item a ,.thumb .mdui-list-item {
	width:217px;
	height: 230px;
	float: left;
	margin: 10px 10px !important;
}

.thumb .mdui-col-xs-12,.thumb .mdui-col-sm-7{
	width:100% !important;
	height:230px;
}

.thumb .mdui-list-item .mdui-icon{
	font-size:100px;
	display: block;
	margin-top: 40px;
	color: #7e7e7e;
}
.thumb .mdui-list-item span{
	float: left;
	display: block;
	text-align: center;
	width:100%;
	position: absolute;
    top: 180px;
}
/*右下角按钮*/
.fixedFight{
    position: fixed;
    right: 24px;
    bottom: 24px;
}
.fixedFight .fixed-fight-list{
    text-align: center;
    line-height: 56px;
    width: 56px;
    height: 56px;
    color: #fff;
    cursor: pointer;
    transition: all .2s;
    background-color: #35B995;
    border-radius: 50%;
    margin-bottom: 15px;
}
.fixed-fight-list:hover{
    opacity: .87;
}
.fixed-fight-list svg{
    width: 40px;
    height: 40px;
    margin-top: 7px;
}
</style>
<div class="nexmoe-item">
<div class="mdui-row">
	<ul class="mdui-list">
		<li class="mdui-list-item th">
		  <div class="mdui-col-xs-12 mdui-col-sm-7">文件 <i class="mdui-icon material-icons icon-sort" data-sort="name" data-order="downward">expand_more</i></div>
		  <div class="mdui-col-sm-3 mdui-text-right">修改时间 <i class="mdui-icon material-icons icon-sort" data-sort="date" data-order="downward">expand_more</i></div>
		  <div class="mdui-col-sm-2 mdui-text-right">大小 <i class="mdui-icon material-icons icon-sort" data-sort="size" data-order="downward">expand_more</i></div>
		</li>
		<?php if($path != '/'):?>
		<li class="mdui-list-item mdui-ripple">
			<a href="<?php echo get_absolute_path($root.$path.'../');?>">
			  <div class="mdui-col-xs-12 mdui-col-sm-7">
				<i class="mdui-icon material-icons">arrow_upward</i>
		    	..
			  </div>
			  <div class="mdui-col-sm-3 mdui-text-right"></div>
			  <div class="mdui-col-sm-2 mdui-text-right"></div>
		  	</a>
		</li>
		<?php endif;?>
		
		<?php foreach((array)$items as $item):?>
			<?php if(!empty($item['folder'])):?>

		<li class="mdui-list-item mdui-ripple">
			<a href="<?php echo get_absolute_path($root.$path.rawurlencode($item['name']));?>">
			  <div class="mdui-col-xs-12 mdui-col-sm-7 mdui-text-truncate">
				<i class="mdui-icon material-icons">folder_open</i>
		    	<span><?php e($item['name']);?></span>
			  </div>
			  <div class="mdui-col-sm-3 mdui-text-right"><?php echo date("Y-m-d H:i:s", $item['lastModifiedDateTime']);?></div>
			  <div class="mdui-col-sm-2 mdui-text-right"><?php echo onedrive::human_filesize($item['size']);?></div>
		  	</a>
		</li>
			<?php else:?>
		<li class="mdui-list-item file mdui-ripple">
			<a href="<?php echo get_absolute_path($root.$path).rawurlencode($item['name']);?>" target="_blank">
			  <div class="mdui-col-xs-12 mdui-col-sm-7 mdui-text-truncate">
				<i class="mdui-icon material-icons"><?php echo file_ico($item);?></i>
		    	<span><?php e($item['name']);?></span>
			  </div>
			  <div class="mdui-col-sm-3 mdui-text-right"><?php echo date("Y-m-d H:i:s", $item['lastModifiedDateTime']);?></div>
			  <div class="mdui-col-sm-2 mdui-text-right"><?php echo onedrive::human_filesize($item['size']);?></div>
		  	</a>
		</li>
			<?php endif;?>
		<?php endforeach;?>
	</ul>
</div>
</div>
<?php if($readme):?>
<div class="nexmoe-item">
	<div class="mdui-typo" style="padding: 20px;">
		<div class="mdui-chip">
		  <span class="mdui-chip-icon"><i class="mdui-icon material-icons">face</i></span>
		  <span class="mdui-chip-title">README.md</span>
		</div>
        <div class="show-readme" id="show_readme">
            <textarea name="show_readme" style="display:none;"><?php e($readme);?></textarea>
        </div>		
	</div>
</div>
<!-- editor.md引用 -->
<!-- https://pan.aoe.top/scripts/lib/editor.md/editormd.js -->
<script src="https://code.aoe.top/libs/jquery/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://code.aoe.top/libs/editor.md/css/editormd.min.css" >
<script type="text/javascript" src="https://code.aoe.top/libs/editor.md/lib/marked.min.js"></script>
<script type="text/javascript" src="https://code.aoe.top/libs/editor.md/lib/raphael.min.js"></script>
<script type="text/javascript" src="https://code.aoe.top/libs/editor.md/lib/prettify.min.js"></script>
<script type="text/javascript" src="https://code.aoe.top/libs/editor.md/lib/underscore.min.js"></script>
<script type="text/javascript" src="https://code.aoe.top/libs/editor.md/lib/sequence-diagram.min.js"></script>
<script type="text/javascript" src="https://code.aoe.top/libs/editor.md/lib/flowchart.min.js"></script>
<script type="text/javascript" src="https://code.aoe.top/libs/editor.md/lib/jquery.flowchart.min.js"></script>
<script type="text/javascript" src="https://code.aoe.top/libs/editor.md/editormd.js"></script>
<script>
    var testEditor;
    testEditor = editormd.markdownToHTML("show_readme", {
        // htmlDecode      : "style,script,sub,sup,embed|onclick,title,onmouseover,onmouseout,style",  // Filter tags, and all on* attributes
        htmlDecode      : "style,script,sub,sup,embed|on*",  // Filter tags, and all on* attributes
        // htmlDecode      : true,  // Filter tags, and all on* attributes
        syncScrolling   : "single",
        emoji           : true,
        taskList        : true,
        tocm            : true,  // 解析下拉目录
        tex             : false,  // 默认不解析
        flowChart       : true,  // 默认不解析
        sequenceDiagram : true,  // 默认不解析
        path            : "https://code.aoe.top/libs/editor.md/lib/",
    });
    $("#show_readme a").attr("target", "_blank");
</script>
<?php endif;?>
</div>
    <script>
    $ = mdui.JQ;

    $.fn.extend({
        sortElements: function (comparator, getSortable) {
            getSortable = getSortable || function () { return this; };

            var placements = this.map(function () {
                var sortElement = getSortable.call(this),
                    parentNode = sortElement.parentNode,
                    nextSibling = parentNode.insertBefore(
                        document.createTextNode(''),
                        sortElement.nextSibling
                    );

                return function () {
                    parentNode.insertBefore(this, nextSibling);
                    parentNode.removeChild(nextSibling);
                };
            });

            return [].sort.call(this, comparator).each(function (i) {
                placements[i].call(getSortable.call(this));
            });
        }
    });

    function downall() {
        let dl_link_list = Array.from(document.querySelectorAll("li a"))
            .map(x => x.href) // 所有list中的链接
            .filter(x => x.slice(-1) != "/"); // 筛选出非文件夹的文件下载链接

        let blob = new Blob([dl_link_list.join("\r\n")], {
            type: 'text/plain'
        }); // 构造Blog对象
        let a = document.createElement('a'); // 伪造一个a对象
        a.href = window.URL.createObjectURL(blob); // 构造href属性为Blob对象生成的链接
        a.download = "folder_download_link.txt"; // 文件名称，你可以根据你的需要构造
        a.click() // 模拟点击
        a.remove();
    }

    function thumb(){
        if($('.mdui-fab i').text() == "apps"){
            $('.mdui-fab i').text("format_list_bulleted");
            $('.nexmoe-item').removeClass('thumb');
            $('.nexmoe-item .mdui-icon').show();
            $('.nexmoe-item .mdui-list-item').css("background","");
        }else{
            $('.mdui-fab i').text("apps");
            $('.nexmoe-item').addClass('thumb');
            $('.mdui-col-xs-12 i.mdui-icon').each(function(){
                if($(this).text() == "image" || $(this).text() == "ondemand_video"){
                    var href = $(this).parent().parent().attr('href');
                    var thumb =(href.indexOf('?') == -1)?'?t=220':'&t=220';
                    $(this).hide();
                    $(this).parent().parent().parent().css("background","url("+href+thumb+")  no-repeat center top");
                }
            });
        }

    }	

    $(function(){
        $('.file a').each(function(){
            $(this).on('click', function () {
                var form = $('<form target=_blank method=post></form>').attr('action', $(this).attr('href')).get(0);
                $(document.body).append(form);
                form.submit();
                $(form).remove();
                return false;
            });
        });

        $('.icon-sort').on('click', function () {
            let sort_type = $(this).attr("data-sort"), sort_order = $(this).attr("data-order");
            let sort_order_to = (sort_order === "less") ? "more" : "less";

            $('li[data-sort]').sortElements(function (a, b) {
                let data_a = $(a).attr("data-sort-" + sort_type), data_b = $(b).attr("data-sort-" + sort_type);
                let rt = data_a.localeCompare(data_b, undefined, {numeric: true});
                return (sort_order === "more") ? 0-rt : rt;
            });

            $(this).attr("data-order", sort_order_to).text("expand_" + sort_order_to);
        });
    });
    </script>
    <div class="fixedFight">
        <div class="fixed-fight-list hide" type="toHide" title="我只想看妹子">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill toHide" viewBox="0 0 16 16">
                <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
            </svg>
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill toShow" style="display:none" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
            </svg>
        </div>
        <div class="fixed-fight-list refresh" title="重(换)载(个)页(妹)面(子)">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
            </svg>
        </div>
        <div class="fixed-fight-list" onclick="thumb()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
            <!--<a href="javascript:thumb()" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">format_list_bulleted</i></a>-->
        </div>
    </div>
	<script src="https://code.aoe.top/libs/jquery/jquery-3.6.0.min.js"></script>
    <script>
        $(".hide").click(function(){
            var type = $(this).attr('type');
            if (type == "toHide"){
                $(".mdui-container-fluid").fadeOut();
                $(this).attr('type',"toShow");
                
                $(".toShow").show();
                $(".toHide").hide();
            }else{
                $(".mdui-container-fluid").fadeIn();
                $(this).attr('type',"toHide");
                
                $(".toHide").show();
                $(".toShow").hide();
            }
        })
        // 刷新
        $(".refresh").click(function () {
            location.reload();
        });
    </script>
<?php view::end('content');?>
