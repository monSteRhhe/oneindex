<?php view::layout('layout')?>
<?php 
	function code_type($ext){
		$code_type['html'] = 'html';
		$code_type['htm'] = 'html';
		$code_type['php'] = 'php';
		$code_type['css'] = 'css';
		$code_type['go'] = 'golang';
		$code_type['java'] = 'java';
		$code_type['js'] = 'javascript';
		$code_type['json'] = 'json';
		$code_type['txt'] = 'Text';
		$code_type['sh'] = 'sh';
		$code_type['md'] = 'Markdown';
		
		return @$code_type[$ext];
	}
	$language = code_type($ext);

	$content = IndexController::get_content($item);
?>
<?php view::begin('content');?>
<style type="text/css" media="screen">
    #editor { 
        /*height:800px;*/
    }
</style>
<div class="mdui-container-fluid">
    <div class="nexmoe-item">

        
        <?php if($language == "Markdown"): ?>
            <div class="show-readme" id="show_readme">
                <textarea name="show_readme" style="display:none;"><?php e($content);?></textarea>
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
        <?php else: ?>

        <pre id="editor" ><?php echo htmlentities($content);?></pre>

        <?php endif; ?>

        <div class="mdui-textfield">
	        <label class="mdui-textfield-label">下载地址</label>
	        <input class="mdui-textfield-input" type="text" value="<?php e($url);?>"/>
        </div>
    
    </div>
</div>
<a href="<?php e($url);?>" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">file_download</i></a>

<script src="https://cdn.bootcss.com/ace/1.2.9/ace.js"></script>
<script src="https://cdn.bootcss.com/ace/1.2.9/ext-language_tools.js"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/ambiance");
    editor.setFontSize(18);
    editor.session.setMode("ace/mode/<?php e($language);?>");
    
    //Autocompletion
    editor.setOptions({
        enableBasicAutocompletion: true,
        enableSnippets: true,
        enableLiveAutocompletion: true,
        maxLines: Infinity
    });
</script>
<?php view::end('content');?>