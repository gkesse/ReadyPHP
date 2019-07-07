<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
		<script>hljs.initHighlightingOnLoad();</script>
	</head>
	<body>
		<pre>
			<code class="">
    //===============================================
    #include "GSingleton.h"
    //===============================================
    int main(int argc, char** argv) {
        GSingleton::Instance()->showData();
        GSingleton::Instance()->setData("Hello World");
        GSingleton::Instance()->showData();
        GSingleton::Instance()->setData("Welcome Singleton");
        GSingleton::Instance()->showData();
        return 0;
    }
    //===============================================
			</code>
		</pre>
	</body>
</html>
