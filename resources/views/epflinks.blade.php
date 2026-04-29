<!doctype html>
<html lang='en'>
<head>
	<!-- Required meta tags -->
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'>
	<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js'></script>
	<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/styles.css')}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>

	<title>API Explorer</title>
</head>
<script>
    function runFunction(theUrl) {
        document.body.style.cursor = 'wait';
        $.ajax({
            type: "GET"
            , url: theUrl 
        }).done(function(msg) {
            if (typeof msg === 'string') {
                const jsonObject = JSON.parse(msg);
                if (jsonObject.message) {
                    const formattedJson = JSON.stringify(jsonObject, null, 2); 
                    const displayElement = document.getElementById("json-display");
                    displayElement.innerHTML = "<pre>" + formattedJson + "</pre>"; // Display in a <pre> tag

                    const respCode = document.getElementById('status');
                    respCode.innerHTML = "Bad Request"; 
                }
            } else {
				    if (theUrl.includes("create") || theUrl.includes("getquote")) {
						msg.length = 1;
					}
                    const formattedJson = JSON.stringify(msg, null, 2); 
                    const displayElement = document.getElementById("json-display");
                    displayElement.innerHTML = "<pre>" + formattedJson + "</pre>"; // Display in a <pre> tag

                    const respCode = document.getElementById('status');
                    respCode.innerHTML = "Success"; 

            		const jsTreeData = convertJsonToJsTree(msg);
                    $("#tree").jstree().settings.core.data = jsTreeData;
                    $("#tree").jstree().refresh(true);
            }

            document.body.style.cursor = 'default';
        });
    }

    function clearFunction() {
        const displayElement = document.getElementById("json-display");
        displayElement.innerHTML = ""; 
        const respCode = document.getElementById('status');
        respCode.innerHTML = ""; 

        var emptyData = [];
        const jsTreeData = convertJsonToJsTree(emptyData);
        $("#tree").jstree().settings.core.data = jsTreeData;
        $("#tree").jstree().refresh(true);
    }

</script>
<body>
<!-- Side navigation -->
<div class='container-fluid'>
	<div class='row flex-nowrap'>
		@include('mainmenu')
		<div class='vstack content-container'>
			<h3>Embedded Premium Finance Links</h3>
			<div>
				<ul class='nav nav-tabs' id='myTab' role='tablist'>
					<li class='nav-item' role='presentation'>
						<a class='nav-link {% if active_tab == "create" %}active{% endif %}' id='create-tab'
						   data-toggle='tab' href='#create'
						   role='tab'
						   aria-controls='create' aria-selected='true'>Quote Create</a>
					</li>
					<li class='nav-item' role='presentation'>
						<a class='nav-link {% if active_tab == "createlink" %}active{% endif %}' id='createlink-tab'
						   data-toggle='tab' href='#createlink'
						   role='tab'
						   aria-controls='createlink' aria-selected='true'>Payment Link Create</a>
					</li>
					<li class='nav-item' role='presentation'>
						<a class='nav-link {% if active_tab == "getbypaymentlink" %}active{% endif %}' id='getbypaymentlink-tab'
						   data-toggle='tab' href='#getbypaymentlink'
						   role='tab'
						   aria-controls='getbypaymentlink' aria-selected='true'>Get Quote by Payment Link</a>
					</li>
				</ul>
			</div>

			<div class='tab-content'>
				<div class='tab-pane {% if active_tab == "create" %}active{% endif %}' id='create' role='tabpanel'
				     aria-labelledby='create-tab'>
					<h3>Quote Create</h3>
					<p>Payload File: public\requests\EPFLinksQuoteCreate.json</p>
					<button class="openModal" data-modal-id='EPFLinksQuoteCreate' type='button' data-bs-toggle='modal' data-bs-target='#EPFLinksQuoteCreate'>
						View Payload Contents
					</button>
					<!-- Modal HTML -->
					<div class='modal fade' id='EPFLinksQuoteCreate'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title'>
										EPFLinksQuoteGenerate.json
									</h5>
									<button type='button'
									        class='btn-close'
									        data-bs-dismiss='modal'>
									</button>
								</div>
								<div id='modalContentEPFLinksQuoteCreate'>
								</div>
							</div>
						</div>
					</div>
					<p>
						<a href='https://explorer.anddone.com/explorer/#/e/secure-epflite-quotes-generate-post'
						   target='_blank'>API Endpoint Documentation</a></p>
					<br/>
					<div class='hstack'>
				        <form>
							<button type='button' onclick="runFunction('/epf-quotecreate'); return false;" >Run</button>
						</form>
						<form>
							<button type='button' onclick="clearFunction(); return false;" >Clear</button>
						</form>
					</div>
				</div>

				<div class='tab-pane {% if active_tab == "createlink" %}active{% endif %}' id='createlink' role='tabpanel'
				     aria-labelledby='createlink-tab'>
					<h3>Payment Link Create</h3>
					<p>Payload File: public\requests\EPFLinksPaymentLinkCreate.json</p>
					<button class="openModal" data-modal-id='EPFLinksPaymentLinkCreate' type='button' data-bs-toggle='modal' data-bs-target='#EPFLinksPaymentLinkCreate'>
						View Payload Contents
					</button>
					<!-- Modal HTML -->
					<div class='modal fade' id='EPFLinksPaymentLinkCreate'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title'>
										EPFLinksPaymentLinkGenerate.json
									</h5>
									<button type='button'
									        class='btn-close'
									        data-bs-dismiss='modal'>
									</button>
								</div>
								<div id='modalContentEPFLinksPaymentLinkCreate'>
								</div>
							</div>
						</div>
					</div>
					<p>
						<a href='https://explorer.anddone.com/explorer/#/e/secure-epflite-quotes-paymentlinks-post'
						   target='_blank'>API Endpoint Documentation</a></p>
					<br/>
					<div class='hstack'>
				        <form>
							<button type='button' onclick="runFunction('/epf-paymentlinkcreate'); return false;" >Run</button>
						</form>
						<form>
							<button type='button' onclick="clearFunction(); return false;" >Clear</button>
						</form>
					</div>
				</div>

				<div class='tab-pane {% if active_tab == "getbypaymentlink" %}active{% endif %}' id='getbypaymentlink' role='tabpanel'
				     aria-labelledby='getbypaymentlink-tab'>
					<h3>Get Quote by Payment Link</h3>
					<p>Payload File: public\requests\EPFLinksGetByPaymentLink.json</p>
					<button class="openModal" data-modal-id='EPFLinksGetByPaymentLink' type='button' data-bs-toggle='modal' data-bs-target='#EPFLinksGetByPaymentLink'>
						View Payload Contents
					</button>
					<!-- Modal HTML -->
					<div class='modal fade' id='EPFLinksGetByPaymentLink'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title'>
										EPFLinksGetByPaymentLink.json
									</h5>
									<button type='button'
									        class='btn-close'
									        data-bs-dismiss='modal'>
									</button>
								</div>
								<div id='modalContentEPFLinksGetByPaymentLink'>
								</div>
							</div>
						</div>
					</div>
					<p>
						<a href='https://explorer.anddone.com/explorer/#/e/secure-epflite-quotes-link-post'
						   target='_blank'>API Endpoint Documentation</a></p>
					<br/>
					<div class='hstack'>
				        <form>
							<button type='button' onclick="runFunction('/epf-paymentlinkgetquote'); return false;" >Run</button>
						</form>
						<form>
							<button type='button' onclick="clearFunction(); return false;" >Clear</button>
						</form>
					</div>
				</div>

			</div>
			<div class='hstack'>
				<p>Response Code:&nbsp;</p>
				<p id='status'></p>
			</div>
			<table>
				<tr></tr>
				<tr>
					<td><h5>Response JSON</h5></td>
					<td><h5>Tree View</h5></td>
				</tr>
				<tr>
					<td style="padding-right:40px;">
						<div id='json-display' class='overflow-auto' style='width: 500px; height: 400px'></div>
					</td>
					<td>
						<div id='tree' class='overflow-auto' style='width: 500px; height: 400px'></div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM'
        crossorigin='anonymous'></script>
<script>
	var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
	const status = document.getElementById('status')
	const data = document.getElementById('data')
	const tree = document.getElementById('tree')
	triggerTabList.forEach(function (triggerEl) {
	  var tabTrigger = new bootstrap.Tab(triggerEl)

	  triggerEl.addEventListener('click', function (event) {
		event.preventDefault()
		tabTrigger.show()
		status.style.display = 'none'
        clearFunction();
	  })
	})

    var triggerEl = document.querySelector('#myTab a[href="#create"]')
    var triggerEl = document.querySelector('#myTab a[href="#createlink"]')
    var triggerEl = document.querySelector('#myTab a[href="#getbypaymentlink"]')
    $('[id="create"]').addClass("active")
    $('[id="create-tab"]').addClass("active")
</script>
<script>
   var emptyData = [];
    $("#tree")
        .jstree({
            "core" : {
            "data" : emptyData
        }
    });

function convertJsonToJsTree(data) {

    if (Array.isArray(data)) {
        return data.map((item, index) => ({
            text: "Quote ",
            children: convertJsonToJsTree(item)
        }));
    }

    if (typeof data === "object" && data !== null) {
        return Object.keys(data).map(key => {
            let value = data[key];

            if (typeof value === "object" && value !== null) {
                return {
                    text: key,
                    children: convertJsonToJsTree(value)
                };
            }

            return {
                text: key + ": " + value
            };
        });
    }

    return [{ text: String(data) }];
}

</script>
<script src="/js/formatter.js"></script>
<script>
	$(document).ready(function() {
        $(".openModal").click(function() {
            var modalId = $(this).data("modal-id");
            var modal = document.getElementById(modalId);
            var contentId = "modalContent" + modalId;
            var contentDiv = $("#" + contentId);

       fetch("/requests/" + modalId + ".json")
            .then((res) => res.text())
            .then((text) => {
                contentDiv.html("<pre>" + text + "</pre>"); // Add <pre> for formatting
                modal.style.display = "block";
            })
            .catch((e) => console.error(e));

            $(modal).find(".close").click(function() {
              modal.style.display = "none";
            });
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

        });
    });
</script>
</body>
</html>