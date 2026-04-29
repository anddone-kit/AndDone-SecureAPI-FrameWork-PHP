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
            if (typeof msg === 'string' || typeof msg === 'object' && msg !== null && !Array.isArray(msg)) {
                const displayElement = document.getElementById("json-display");
                displayElement.innerHTML = "<pre>Payment Link Expired</pre>";

                const respCode = document.getElementById('status');
                respCode.innerHTML = "Success";
                respCode.style.display = 'block';
            } else {
                if (theUrl.includes("create") || theUrl.includes("details") ||
                    theUrl.includes("update")) {
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
                <h3>Payment Links</h3>
                <div>
                    <ul class='nav nav-tabs' id='myTab' role='tablist'>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "create" %}active{% endif %}' id='create-tab' data-toggle='tab' href='#create' role='tab' aria-controls='create' aria-selected='true'>Create</a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "details" %}active{% endif %}' id='details-tab' data-toggle='tab' href='#details' role='tab' aria-controls='details' aria-selected='false'>Details</a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "update" %}active{% endif %}' id='update-tab' data-toggle='tab' href='#update' role='tab' aria-controls='update' aria-selected='false'>Update</a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "expiration" %}active{% endif %}' id='expiration-tab' data-toggle='tab' href='#expiration' role='tab' aria-controls='expiration' aria-selected='false'>Expiration</a>
                        </li>
                    </ul>
                </div>

                <div class='tab-content'>
                    <div class='tab-pane {% if active_tab == "create" %}active{% endif %}' id='create' role='tabpanel' aria-labelledby='create-tab'>
                        <h3>Create</h3>
                        <p>Payload File: public\requests\SecurePaymentLinkCreate.json</p>
                        <button class="openModal" data-modal-id='SecurePaymentLinkCreate' type='button' data-bs-toggle='modal' data-bs-target='#SecurePaymentLinkCreate'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecurePaymentLinkCreate'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecurePaymentLinkCreate.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecurePaymentLinkCreate'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p><a href='https://explorer.anddone.com/#/e/secure-paymentlinks-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/paymentlinks-create'); return false;">Run</button>
                            </form>
                            <form>
                                <button type='button' onclick="clearFunction(); return false;">Clear</button>
                            </form>
                        </div>
                    </div>

                    <div class='tab-pane {% if active_tab == "details" %}active{% endif %}' id='details' role='tabpanel' aria-labelledby='details-tab'>
                        <h3>Details</h3>
                        <p>Payload File: public\requests\SecurePaymentLinkDetail.json</p>
                        <button class="openModal" data-modal-id='SecurePaymentLinkDetail' type='button' data-bs-toggle='modal' data-bs-target='#SecurePaymentLinkDetail'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecurePaymentLinkDetail'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecurePaymentLinkDetail.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecurePaymentLinkDetail'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p><a href='https://explorer.anddone.com/#/e/secure-paymentlinks-details-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/paymentlinks-details'); return false;">Run</button>
                            </form>
                            <form>
                                <button type='button' onclick="clearFunction(); return false;">Clear</button>
                            </form>
                        </div>
                    </div>

                    <div class='tab-pane {% if active_tab == "update" %}active{% endif %}' id='update' role='tabpanel' aria-labelledby='update-tab'>
                        <h3>Update</h3>
                        <p>Payload File: public\requests\SecurePaymentLinkUpdate.json</p>
                        <button class="openModal" data-modal-id='SecurePaymentLinkUpdate' type='button' data-bs-toggle='modal' data-bs-target='#SecurePaymentLinkUpdate'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecurePaymentLinkUpdate'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecurePaymentLinkUpdate.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecurePaymentLinkUpdate'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p><a href='https://explorer.anddone.com/#/e/secure-paymentlinks--id-put' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/paymentlinks-update'); return false;">Run</button>
                            </form>
                            <form>
                                <button type='button' onclick="clearFunction(); return false;">Clear</button>
                            </form>
                        </div>
                    </div>

                    <div class='tab-pane {% if active_tab == "expiration" %}active{% endif %}' id='expiration' role='tabpanel' aria-labelledby='expiration-tab'>
                        <h3>Expiration</h3>
                        <p>Payload File: public\requests\SecurePaymentLinkExpiration.json</p>
                        <button class="openModal" data-modal-id='SecurePaymentLinkExpiration' type='button' data-bs-toggle='modal' data-bs-target='#SecurePaymentLinkExpiration'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecurePaymentLinkExpiration'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecurePaymentLinkExpiration.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecurePaymentLinkExpiration'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p><a href='https://explorer.anddone.com/#/e/secure-paymentlinks-expirations-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/paymentlinks-expirations'); return false;">Run</button>
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

        var triggerEl = document.querySelector('#myTab a[href="#create"]');
        var triggerEl = document.querySelector('#myTab a[href="#details"]');
        var triggerEl = document.querySelector('#myTab a[href="#update"]');
        var triggerEl = document.querySelector('#myTab a[href="#expiration"]');
        $('[id="create"]').addClass("active")
        $('[id="create-tab"]').addClass("active")

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
                    text: "Payment Link "
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
