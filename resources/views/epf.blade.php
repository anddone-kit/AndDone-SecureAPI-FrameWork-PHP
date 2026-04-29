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
				if (msg == "Signature Complete") {
                    const displayElement = document.getElementById("json-display");
                    displayElement.innerHTML = "<pre>" + msg + "</pre>"; // Display in a <pre> tag

                    const respCode = document.getElementById('status');
                    respCode.innerHTML = msg;
            		document.body.style.cursor = 'default';
					return;
                } 
                const jsonObject = JSON.parse(msg);
                if (jsonObject.message) {
                    const formattedJson = JSON.stringify(jsonObject, null, 2); 
                    const displayElement = document.getElementById("json-display");
                    displayElement.innerHTML = "<pre>" + formattedJson + "</pre>"; // Display in a <pre> tag

                    const respCode = document.getElementById('status');
                    respCode.innerHTML = "Bad Request"; 
                }
            } else {
					msg.length = 1;  
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
			<h3>Embedded Premium Finance</h3>
			<div>
				<ul class='nav nav-tabs' id='myTab' role='tablist'>
					<li class='nav-item' role='presentation'>
						<a class='nav-link {% if active_tab == "generate" %}active{% endif %}' id='generate-tab'
						   data-toggle='tab' href='#generate' role='tab'
						   aria-controls='generate' aria-selected='true'>Generate Quote</a>
					</li>
					<li class='nav-item' role='presentation'>
						<a class='nav-link {% if active_tab == "key" %}active{% endif %}' id='key-tab'
						   data-toggle='tab' href='#key' role='tab'
						   aria-controls='key' aria-selected='false'>Search by Quote Key</a>
					</li>
					<li class='nav-item' role='presentation'>
						<a class='nav-link {% if active_tab == "intent" %}active{% endif %}' id='intent-tab'
						   data-toggle='tab' href='#intent' role='tab'
						   aria-controls='intent' aria-selected='false'>Search by Payment Intent</a>
					</li>
					<li class='nav-item {% if active_tab == "retrieve" %}active{% endif %}' role='presentation'>
						<a class='nav-link' id='retrieve-tab' data-toggle='tab' href='#retrieve' role='tab'
						   aria-controls='retrieve' aria-selected='false'>Retrieve Endorsement Eligibility</a>
					</li>
					<li class='nav-item {% if active_tab == "endorse" %}active{% endif %}' role='presentation'>
						<a class='nav-link' id='endorse-tab' data-toggle='tab' href='#endorse' role='tab'
						   aria-controls='endorse' aria-selected='false'>Create Policy Endorsement</a>
					</li>
					<li class='nav-item' role='presentation'>
						<a class='nav-link {% if active_tab == "book" %}active{% endif %}' id='book-tab'
						   data-toggle='tab' href='#book' role='tab'
						   aria-controls='book' aria-selected='true'>Book Endorsement</a>
					</li>
					<li class='nav-item {% if active_tab == "bookQuote" %}active{% endif %}' role='presentation'>
						<a class='nav-link' id='bookQuote-tab' data-toggle='tab' href='#bookQuote' role='tab'
						   aria-controls='bookQuote' aria-selected='false'>Book Quote</a>
					</li>
					<li class='nav-item' role='presentation'>
						<a class='nav-link {% if active_tab == "pfa" %}active{% endif %}' id='pfa-tab'
						   data-toggle='tab' href='#pfa' role='tab'
						   aria-controls='pfa' aria-selected='false'>Retrieve PFA</a>
					</li>
					<li class='nav-item' role='presentation'>
						<a class='nav-link {% if active_tab == "update" %}active{% endif %}' id='update-tab'
						   data-toggle='tab' href='#update' role='tab'
						   aria-controls='update' aria-selected='false'>Update Policy</a>
					</li>
					<li class='nav-item {% if active_tab == "eSign" %}active{% endif %}' role='presentation'>
						<a class='nav-link' id='eSign-tab' data-toggle='tab' href='#eSign' role='tab'
						   aria-controls='eSign' aria-selected='false'>Capture eSign</a>
					</li>
				</ul>
			</div>

			<div class='tab-content'>
				<div class='tab-pane {% if active_tab == "generate" %}active{% endif %}' id='generate' role='tabpanel'
				     aria-labelledby='generate-tab'>
					<h3>Generate Quote</h3>
					<p>Payload File: public\requests\EPFQuotesGenerate.json</p>
					<button class="openModal" data-modal-id='EPFQuotesGenerate' type='button' data-bs-toggle='modal' data-bs-target='#EPFQuotesGenerate'>
						View Payload Contents
					</button>
					<!-- Modal HTML -->
					<div class='modal fade' id='EPFQuotesGenerate'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title'>
										EPFQuotesGenerate.json
									</h5>
									<button type='button'
									        class='btn-close'
									        data-bs-dismiss='modal'>
									</button>
								</div>
								<div id='modalContentEPFQuotesGenerate'>
								</div>
							</div>
						</div>
					</div>
					<p><a href='https://explorer.anddone.com/#/e/secure-epf-quotes-generate-post'
					      target='_blank'>API Endpoint Documentation</a></p>
					<br/>
					<div class='hstack'>
					    <form>
							<button type='button' onclick="runFunction('/epf-generatequote'); return false;" >Run</button>
						</form>
						<form>
							<button type='button' onclick="clearFunction(); return false;" >Clear</button>
						</form>
					</div>
				</div>

				<div class='tab-pane {% if active_tab == "key" %}active{% endif %}' id='key' role='tabpanel'
				     aria-labelledby='key-tab'>
					<h3>Search by Quote Key</h3>
					<p>Payload File: public\requests\EPFQuotesByKey.json</p>
					<button class="openModal" data-modal-id='EPFQuotesByKey' type='button' data-bs-toggle='modal' data-bs-target='#EPFQuotesByKey'>
						View Payload Contents
					</button>
					<!-- Modal HTML -->
					<div class='modal fade' id='EPFQuotesByKey'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title'>
										EPFQuotesByKey.json
									</h5>
									<button type='button'
									        class='btn-close'
									        data-bs-dismiss='modal'>
									</button>
								</div>
								<div id='modalContentEPFQuotesByKey'>
								</div>
							</div>
						</div>
					</div>
					<p><a href='https://explorer.anddone.com/#/e/secure-epf-quotes-post'
					      target='_blank'>API Endpoint Documentation</a></p>
					<br/>
					<div class='hstack'>
						<form>
							<button type='button' onclick="runFunction('/epf-getquotebykey'); return false;" >Run</button>
						</form>
						<form>
							<button type='button' onclick="clearFunction(); return false;" >Clear</button>
						</form>
					</div>
				</div>

				<div class='tab-pane {% if active_tab == "intent" %}active{% endif %}' id='intent' role='tabpanel'
				     aria-labelledby='intent-tab'>
					<h3>Search by Payment Intent</h3>
					<p>Payload File: public\requests\EPFQuotesByIntent.json</p>
					<button class="openModal" data-modal-id='EPFQuotesByIntent' type='button' data-bs-toggle='modal' data-bs-target='#EPFQuotesByIntent'>
						View Payload Contents
					</button>
					<!-- Modal HTML -->
					<div class='modal fade' id='EPFQuotesByIntent'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title'>
										EPFQuotesByIntent.json
									</h5>
									<button type='button'
									        class='btn-close'
									        data-bs-dismiss='modal'>
									</button>
								</div>
								<div id='modalContentEPFQuotesByIntent'>
								</div>
							</div>
						</div>
					</div>
					<p><a href='https://explorer.anddone.com/#/e/secure-epf-quotes-intent-post'
					      target='_blank'>API Endpoint Documentation</a></p>
					<br/>
					<div class='hstack'>
						<form>
							<button type='button' onclick="runFunction('/epf-getquotebyintent'); return false;" >Run</button>
						</form>
						<form>
							<button type='button' onclick="clearFunction(); return false;" >Clear</button>
						</form>
					</div>
				</div>

				<div class='tab-pane {% if active_tab == "retrieve" %}active{% endif %}' id='retrieve'
				     role='tabpanel' aria-labelledby='retrieve-tab'>
					<h3>Retrieve Endorsement Eligibility</h3>
					<p>Payload File: public\requests\EPFEndorsements.json</p>
					<button class="openModal" data-modal-id='EPFEndorsements' type='button' data-bs-toggle='modal' data-bs-target='#EPFEndorsements'>
						View Payload Contents
					</button>
					<!-- Modal HTML -->
					<div class='modal fade' id='EPFEndorsements'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title'>
										EPFEndorsements.json
									</h5>
									<button type='button'
									        class='btn-close'
									        data-bs-dismiss='modal'>
									</button>
								</div>
								<div id='modalContentEPFEndorsements'>
								</div>
							</div>
						</div>
					</div>
					<p><a href='https://explorer.anddone.com/#/e/secure-epf-endorsements-post'
					      target='_blank'>API Endpoint Documentation</a></p>
					<br/>
					<div class='hstack'>
						<form>
							<button type='button' onclick="runFunction('/epf-retrieveendorsement'); return false;" >Run</button>
						</form>
						<form>
							<button type='button' onclick="clearFunction(); return false;" >Clear</button>
						</form>
					</div>
				</div>

				<div class='tab-pane {% if active_tab == "endorse" %}active{% endif %}' id='endorse' role='tabpanel'
				     aria-labelledby='endorse-tab'>
					<h3>Create Policy Endorsement</h3>
					<p>Payload File: public\requests\EPFEndorsementRequest.json</p>
					<button class="openModal" data-modal-id='EPFEndorsementRequest' type='button' data-bs-toggle='modal' data-bs-target='#EPFEndorsementRequest'>
						View Payload Contents
					</button>
					<!-- Modal HTML -->
					<div class='modal fade' id='EPFEndorsementRequest'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title'>
										EPFEndorsementRequest.json
									</h5>
									<button type='button'
									        class='btn-close'
									        data-bs-dismiss='modal'>
									</button>
								</div>
								<div id='modalContentEPFEndorsementRequest'>
								</div>
							</div>
						</div>
					</div>
					<p>
						<a href='https://explorer.anddone.com/#/e/secure-epf-quote-endorsement-post'
						   target='_blank'>API Endpoint Documentation</a></p>
					<br/>
					<div class='hstack'>
						<form>
							<button type='button' onclick="runFunction('/epf-endorsementrequest'); return false;" >Run</button>
						</form>
						<form>
							<button type='button' onclick="clearFunction(); return false;" >Clear</button>
						</form>					
					</div>
				</div>

				<div class='tab-pane {% if active_tab == "book" %}active{% endif %}' id='book' role='tabpanel'
				     aria-labelledby='book-tab'>
					<h3>Book Endorsement</h3>
					<p>Payload File: public\requests\EPFBookEndorsement.json</p>
					<button class="openModal" data-modal-id='EPFBookEndorsement' type='button' data-bs-toggle='modal' data-bs-target='#EPFBookEndorsement'>
						View Payload Contents
					</button>
					<!-- Modal HTML -->
					<div class='modal fade' id='EPFBookEndorsement'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title'>
										EPFBookEndorsement.json
									</h5>
									<button type='button'
									        class='btn-close'
									        data-bs-dismiss='modal'>
									</button>
								</div>
								<div id='modalContentEPFBookEndorsement'>
								</div>
							</div>
						</div>
					</div>
					<p>
						<a href='https://explorer.anddone.com/#/e/secure-epf-quote-endorsement-booking-put'
						   target='_blank'>API Endpoint Documentation</a></p>
					<br/>
					<div class='hstack'>
						<form>
							<button type='button' onclick="runFunction('/epf-bookendorsement'); return false;" >Run</button>
						</form>
						<form>
							<button type='button' onclick="clearFunction(); return false;" >Clear</button>
						</form>			
					</div>
				</div>

				<div class='tab-pane {% if active_tab == "bookQuote" %}active{% endif %}' id='bookQuote' role='tabpanel'
				     aria-labelledby='bookQuote-tab'>
					<h3>Book Quote</h3>
					<p>Payload File: public\requests\EPFBookQuoteEndorsement.json</p>
					<button class="openModal" data-modal-id='EPFBookQuoteEndorsement' type='button' data-bs-toggle='modal' data-bs-target='#EPFBookQuoteEndorsement'>
						View Payload Contents
					</button>
					<!-- Modal HTML -->
					<div class='modal fade' id='EPFBookQuoteEndorsement'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title'>
										EPFBookQuoteEndorsement.json
									</h5>
									<button type='button'
									        class='btn-close'
									        data-bs-dismiss='modal'>
									</button>
								</div>
								<div id='modalContentEPFBookQuoteEndorsement'>
								</div>
							</div>
						</div>
					</div>
					<p><a href='https://explorer.anddone.com/#/e/secure-epf-quotes-booking-put'
					      target='_blank'>API Endpoint Documentation</a></p>
					<br/>
					<div class='hstack'>
						<form>
							<button type='button' onclick="runFunction('/epf-bookquoteendorsement'); return false;" >Run</button>
						</form>
						<form>
							<button type='button' onclick="clearFunction(); return false;" >Clear</button>
						</form>		
					</div>
				</div>

				<div class='tab-pane {% if active_tab == "pfa" %}active{% endif %}' id='pfa'
				     role='tabpanel' aria-labelledby='pfa-tab'>
					<h3>Retrieve PFA</h3>
					<p>Payload File: public\requests\EPFRetrievePFA.json</p>
					<button class="openModal" data-modal-id='EPFRetrievePFA' type='button' data-bs-toggle='modal' data-bs-target='#EPFRetrievePFA'>
						View Payload Contents
					</button>
					<!-- Modal HTML -->
					<div class='modal fade' id='EPFRetrievePFA'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title'>
										EPFRetrievePFA.json
									</h5>
									<button type='button'
									        class='btn-close'
									        data-bs-dismiss='modal'>
									</button>
								</div>
								<div id='modalContentEPFRetrievePFA'>
								</div>
							</div>
						</div>
					</div>
					<p><a href='https://explorer.anddone.com/#/e/secure-epf-retrievepfa-post'
					      target='_blank'>API Endpoint Documentation</a></p>
					<br/>
					<div class='hstack'>
						<form>
							<button type='button' onclick="runFunction('/epf-retrievepfa'); return false;" >Run</button>
						</form>
						<form>
							<button type='button' onclick="clearFunction(); return false;" >Clear</button>
						</form>			
					</div>
				</div>

				<div class='tab-pane {% if active_tab == "update" %}active{% endif %}' id='update' role='tabpanel'
				     aria-labelledby='update-tab'>
					<h3>Update Policy</h3>
					<p>Payload File: public\requests\EPFQuotesUpdateIntent.json</p>
					<button class="openModal" data-modal-id='EPFQuotesUpdateIntent' type='button' data-bs-toggle='modal' data-bs-target='#EPFQuotesUpdateIntent'>
						View Payload Contents
					</button>
					<!-- Modal HTML -->
					<div class='modal fade' id='EPFQuotesUpdateIntent'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title'>
										EPFQuotesUpdateIntent.json
									</h5>
									<button type='button'
									        class='btn-close'
									        data-bs-dismiss='modal'>
									</button>
								</div>
								<div id='modalContentEPFQuotesUpdateIntent'>
								</div>
							</div>
						</div>
					</div>
					<p>
						<a href='https://explorer.anddone.com/#/e/secure-epf-updateintent-put'
						   target='_blank'>API Endpoint Documentation</a></p>
					<br/>
					<div class='hstack'>
						<form>
							<button type='button' onclick="runFunction('/epf-updateintent'); return false;" >Run</button>
						</form>
						<form>
							<button type='button' onclick="clearFunction(); return false;" >Clear</button>
						</form>		
					</div>
				</div>

				<div class='tab-pane {% if active_tab == "eSign" %}active{% endif %}' id='eSign' role='tabpanel'
				     aria-labelledby='eSign-tab'>
					<h3>Capture eSign</h3>
					<p>Payload File: public\requests\EPFCaptureeSign.json</p>
					<button class="openModal" data-modal-id='EPFCaptureeSign' type='button' data-bs-toggle='modal' data-bs-target='#EPFCaptureeSign'>
						View Payload Contents
					</button>
					<!-- Modal HTML -->
					<div class='modal fade' id='EPFCaptureeSign'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title'>
										EPFCaptureeSign.json
									</h5>
									<button type='button'
									        class='btn-close'
									        data-bs-dismiss='modal'>
									</button>
								</div>
								<div id='modalContentEPFCaptureeSign'>
								</div>
							</div>
						</div>
					</div>
					<p><a href='https://explorer.anddone.com/#/e/secure-epf-quotes-captureesign-put'
					      target='_blank'>API Endpoint Documentation</a></p>
					<br/>
					<div class='hstack'>
						<form>
							<button type='button' onclick="runFunction('/epf-captureesign'); return false;" >Run</button>
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

    var triggerEl = document.querySelector('#myTab a[href="#generate"]')
    var triggerEl = document.querySelector('#myTab a[href="#key"]')
    var triggerEl = document.querySelector('#myTab a[href="#intent"]')
    var triggerEl = document.querySelector('#myTab a[href="#retrieve"]')
    var triggerEl = document.querySelector('#myTab a[href="#endorse"]')
	var triggerEl = document.querySelector('#myTab a[href="#book"]')
    var triggerEl = document.querySelector('#myTab a[href="#bookQuote"]')
    var triggerEl = document.querySelector('#myTab a[href="#pfa"]')
    var triggerEl = document.querySelector('#myTab a[href="#update"]')
    var triggerEl = document.querySelector('#myTab a[href="#eSign"]')

	$('[id="generate"]').addClass("active")
    $('[id="generate-tab"]').addClass("active")
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
