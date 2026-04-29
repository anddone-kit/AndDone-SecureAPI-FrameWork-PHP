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
                if (isJsonString(msg)) {
                    const formattedJson = JSON.stringify(msg, null, 2);
                    const displayElement = document.getElementById("json-display");
                    displayElement.innerHTML = "<pre>" + formattedJson + "</pre>"; // Display in a <pre> tag

                    const respCode = document.getElementById('status');
                    respCode.innerHTML = "Success";

                    const jsTreeData = convertJsonToJsTree(msg);
                    $("#tree").jstree().settings.core.data = jsTreeData;
                    $("#tree").jstree().refresh(true);
                } else {
                    if (Array.isArray(msg)) {
						if (theUrl.includes("create") || theUrl.includes("export")) 
 							msg.splice(1);

                        const jsonString = JSON.stringify(msg, null, 2);
                        const displayElement = document.getElementById("json-display");
                        if (jsonString.includes("ShopperName"))
                            displayElement.innerHTML = jsonString;
                        else
                            displayElement.innerHTML = "<pre>" + jsonString + "</pre>"; // Display in a <pre> tag

                        const jsTreeData = convertJsonToJsTree(msg);
                        $("#tree").jstree().settings.core.data = jsTreeData;
                        $("#tree").jstree().refresh(true);
                    } else {
                        const displayElement = document.getElementById("json-display");
                        displayElement.innerHTML = "<pre>" + msg[0] + "</pre>"; // Display in a <pre> tag
                    }
                }
            }

            document.body.style.cursor = 'default';
        });
    }

    function isJsonString(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        alert("yes string")
        return true;
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
                <h3>Payments</h3>
                <div>
                    <ul class='nav nav-tabs' id='myTab' role='tablist'>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "payments" %}active{% endif %}' id='payments-tab' data-toggle='tab' href='#payments' role='tab' aria-controls='payments' aria-selected='true'>Payments</a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "export" %}active{% endif %}' id='export-tab' data-toggle='tab' href='#export' role='tab' aria-controls='export' aria-selected='false'>Export</a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "search" %}active{% endif %}' id='search-tab' data-toggle='tab' href='#search' role='tab' aria-controls='search' aria-selected='false'>Search</a>
                        </li>
                    </ul>
                </div>

                <div class='tab-content'>
                    <div class='tab-pane {% if active_tab == "payments" %}active{% endif %}' id='payments' role='tabpanel' aria-labelledby='payments-tab'>
                        <h3>Payments</h3>
                        <p>Payload File: public\requests\SecurePayments.json</p>
                        <button class="openModal" data-modal-id='SecurePayments' type='button' data-bs-toggle='modal' data-bs-target='#SecurePayments'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecurePayments'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecurePayments.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecurePayments'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p><a href='https://explorer.anddone.com/#/e/secure-payments-search-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/secure-payment-create'); return false;">Run</button>
                            </form>
                            <form>
                                <button type='button' onclick="clearFunction(); return false;">Clear</button>
                            </form>
                        </div>
                    </div>

                    <div class='tab-pane {% if active_tab == "export" %}active{% endif %}' id='export' role='tabpanel' aria-labelledby='export-tab'>
                        <h3>Export</h3>
                        <p>Payload File: public\requests\SecurePaymentsExport.json</p>
                        <button class="openModal" data-modal-id='SecurePaymentsExport' type='button' data-bs-toggle='modal' data-bs-target='#SecurePaymentsExport'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecurePaymentsExport'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecurePaymentsExport.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecurePaymentsExport'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p><a href='https://explorer.anddone.com/#/e/secure-payments-export-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/secure-payment-export'); return false;">Run</button>
                            </form>
                            <form>
                                <button type='button' onclick="clearFunction(); return false;">Clear</button>
                            </form>
                        </div>
                    </div>

                    <div class='tab-pane {% if active_tab == "search" %}active{% endif %}' id='search' role='tabpanel' aria-labelledby='search-tab'>
                        <h3>Search</h3>
                        <p>Payload File: public\requests\SecurePaymentsSearch.json</p>
                        <button class="openModal" data-modal-id='SecurePaymentsSearch' type='button' data-bs-toggle='modal' data-bs-target='#SecurePaymentsSearch'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecurePaymentsSearch'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecurePaymentsSearch.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecurePaymentsSearch'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p><a href='https://explorer.anddone.com/#/e/secure-payments-search-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/secure-payment-search'); return false;">Run</button>
                            </form>
                            <form>
                                <button type='button' onclick="clearFunction(); return false;">Clear</button>
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
                        <td>
                            <h5>Response JSON</h5>
                        </td>
                        <td>
                            <h5>Tree View</h5>
                        </td>
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
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
    <script>
        var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
        const status = document.getElementById('status')
        const data = document.getElementById('data')
        const tree = document.getElementById('tree')
        triggerTabList.forEach(function(triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function(event) {
                event.preventDefault()
                tabTrigger.show()
                status.style.display = 'none'
                clearFunction();
            })
        })

        var triggerEl = document.querySelector('#myTab a[href="#payments"]')
        var triggerEl = document.querySelector('#myTab a[href="#export"]')
        var triggerEl = document.querySelector('#myTab a[href="#search"]')
        $('[id="payments"]').addClass("active")
        $('[id="payments-tab"]').addClass("active")

    </script>
    <script>
        var emptyData = [];
        $("#tree")
            .jstree({
                "core": {
                    "data": emptyData
                }
            });

        function convertJsonToJsTree(data) {

            if (Array.isArray(data)) {
                return data.map((item, index) => ({
                    text: "Payment " + (index + 1)
                    , children: convertJsonToJsTree(item)
                }));
            }

            if (typeof data === "object" && data !== null) {
                return Object.keys(data).map(key => {
                    let value = data[key];

                    if (typeof value === "object" && value !== null) {
                        return {
                            text: key
                            , children: convertJsonToJsTree(value)
                        };
                    }

                    return {
                        text: key + ": " + value
                    };
                });
            }

            return [{
                text: String(data)
            }];
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
