# OneIndex
Onedrive Directory Index



# Deploy to Glitch

How to Install: New Project -> Import form Github -> paste "https://github.com/monSteRhhe/oneindex", after done, Show -> In a New Window.



### 伪静态

```nginx
if (!-f $request_filename){
    set $rule_0 1$rule_0;
}
if (!-d $request_filename){
    set $rule_0 2$rule_0;
}
if ($rule_0 = "21"){
    rewrite ^/(.*)$ /index.php?/$1 last;
}
```



## 功能：

不占用服务器空间，不走服务器流量，

直接列出 OneDrive 目录，文件直链下载。



## 特殊文件实现功能  

`README.md`、`HEAD.md` 、 `.password`特殊文件使用

**在文件夹底部添加说明:** 

> 在 OneDrive 的文件夹中添加`README.md`文件，使用 Markdown 语法。

**在文件夹头部添加说明:** 

> 在 OneDrive 的文件夹中添加`HEAD.md` 文件，使用 Markdown 语法。

**加密文件夹:** 

> 在 OneDrive 的文件夹中添加`.password`文件，填入密码，密码不能为空。  

**直接输出网页:**

> 在 OneDrive 的文件夹中添加`index.html` 文件，程序会直接输出网页而不列目录。
> 配合 文件展示设置-直接输出 效果更佳。

