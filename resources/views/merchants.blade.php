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
                if (msg == "Suspended" || msg == "UnSuspended" || msg == "Deleted") {
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
                if (theUrl.includes("create") || theUrl.includes("details") || theUrl.includes("search")
                    || theUrl.includes("timeline") || theUrl.includes("edit") ){
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
                <h3>Merchants</h3>
                <div>
                    <ul class='nav nav-tabs' id='myTab' role='tablist'>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "create" %}active{% endif %}' id='create-tab' data-toggle='tab' href='#create' role='tab' aria-controls='create' aria-selected='true'>Create</a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "details" %}active{% endif %}' id='details-tab' data-toggle='tab' href='#details' role='tab' aria-controls='details' aria-selected='true'>Details</a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "search" %}active{% endif %}' id='search-tab' data-toggle='tab' href='#search' role='tab' aria-controls='search' aria-selected='true'>Search</a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "suspend" %}active{% endif %}' id='suspend-tab' data-toggle='tab' href='#suspend' role='tab' aria-controls='suspend' aria-selected='true'>Suspend</a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "unsuspend" %}active{% endif %}' id='unsuspend-tab' data-toggle='tab' href='#unsuspend' role='tab' aria-controls='unsuspend' aria-selected='true'>Unsuspend</a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "delete" %}active{% endif %}' id='delete-tab' data-toggle='tab' href='#delete' role='tab' aria-controls='delete' aria-selected='true'>Delete</a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "timeline" %}active{% endif %}' id='timeline-tab' data-toggle='tab' href='#timeline' role='tab' aria-controls='timeline' aria-selected='true'>Timeline</a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "edit" %}active{% endif %}' id='edit-tab' data-toggle='tab' href='#edit' role='tab' aria-controls='edit' aria-selected='true'>Edit</a>
                        </li>
                    </ul>
                </div>

                <div class='tab-content'>
                    <div class='tab-pane {% if active_tab == "create" %}active{% endif %}' id='create' role='tabpanel' aria-labelledby='create-tab'>
                        <h3>Create</h3>
                        <p>Payload File: public\requests\SecureMerchantsVendorCreate.json</p>
                        <button class="openModal" data-modal-id='SecureMerchantsVendorCreate' type='button' data-bs-toggle='modal' data-bs-target='#SecureMerchantsVendorCreate'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecureMerchantsVendorCreate'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecureMerchantsVendorCreate.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecureMerchantsVendorCreate'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            <a href='https://explorer.anddone.com/explorer/#/e/vendorapi-secure-merchants-vendors-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/merchant-create'); return false;">Run</button>
                            </form>
                            <form>
                                <button type='button' onclick="clearFunction(); return false;">Clear</button>
                            </form>
                        </div>
                    </div>

                    <div class='tab-pane {% if active_tab == "details" %}active{% endif %}' id='details' role='tabpanel' aria-labelledby='details-tab'>
                        <h3>Details</h3>
                        <p>Payload File: public\requests\SecureMerchantsVendorDetails.json</p>
                        <button class="openModal" data-modal-id='SecureMerchantsVendorDetails' type='button' data-bs-toggle='modal' data-bs-target='#SecureMerchantsVendorDetails'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecureMerchantsVendorDetails'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecureMerchantsVendorDetails.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecureMerchantsVendorDetails'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            <a href='https://explorer.anddone.com/explorer/#/e/vendorapi-secure-merchants-vendors-details-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/merchant-details'); return false;">Run</button>
                            </form>
                            <form>
                                <button type='button' onclick="clearFunction(); return false;">Clear</button>
                            </form>
                        </div>
                    </div>

                    <div class='tab-pane {% if active_tab == "search" %}active{% endif %}' id='search' role='tabpanel' aria-labelledby='search-tab'>
                        <h3>Search</h3>
                        <p>Payload File: public\requests\SecureMerchantsVendorSearch.json</p>
                        <button class="openModal" data-modal-id='SecureMerchantsVendorSearch' type='button' data-bs-toggle='modal' data-bs-target='#SecureMerchantsVendorSearch'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecureMerchantsVendorSearch'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecureMerchantsVendorSearch.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecureMerchantsVendorSearch'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            <a href='https://explorer.anddone.com/explorer/#/e/vendorapi-secure-merchants-vendors-search-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/merchant-search'); return false;">Run</button>
                            </form>
                            <form>
                                <button type='button' onclick="clearFunction(); return false;">Clear</button>
                            </form>
                        </div>
                    </div>

                    <div class='tab-pane {% if active_tab == "suspend" %}active{% endif %}' id='suspend' role='tabpanel' aria-labelledby='suspend-tab'>
                        <h3>Suspend</h3>
                        <p>Payload File: public\requests\SecureMerchantsVendorSuspend.json</p>
                        <button class="openModal" data-modal-id='SecureMerchantsVendorSuspend' type='button' data-bs-toggle='modal' data-bs-target='#SecureMerchantsVendorSuspend'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecureMerchantsVendorSuspend'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecureMerchantsVendorSuspend.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecureMerchantsVendorSuspend'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            <a href='https://explorer.anddone.com/explorer/#/e/vendorapi-secure-merchants-vendors-suspend-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/merchant-suspend'); return false;">Run</button>
                            </form>
                            <form>
                                <button type='button' onclick="clearFunction(); return false;">Clear</button>
                            </form>
                        </div>
                    </div>

                    <div class='tab-pane {% if active_tab == "unsuspend" %}active{% endif %}' id='unsuspend' role='tabpanel' aria-labelledby='unsuspend-tab'>
                        <h3>Unsuspend</h3>
                        <p>Payload File: public\requests\SecureMerchantsVendorUnsuspend.json</p>
                        <button class="openModal" data-modal-id='SecureMerchantsVendorUnsuspend' type='button' data-bs-toggle='modal' data-bs-target='#SecureMerchantsVendorUnsuspend'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecureMerchantsVendorUnsuspend'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecureMerchantsVendorUnsuspend.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecureMerchantsVendorUnsuspend'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            <a href='https://explorer.anddone.com/explorer/#/e/vendorapi-secure-merchants-vendors-unsuspend-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/merchant-unsuspend'); return false;">Run</button>
                            </form>
                            <form>
                                <button type='button' onclick="clearFunction(); return false;">Clear</button>
                            </form>
                        </div>
                    </div>

                    <div class='tab-pane {% if active_tab == "delete" %}active{% endif %}' id='delete' role='tabpanel' aria-labelledby='delete-tab'>
                        <h3>Delete</h3>
                        <p>Payload File: public\requests\SecureMerchantsVendorDelete.json</p>
                        <button class="openModal" data-modal-id='SecureMerchantsVendorDelete' type='button' data-bs-toggle='modal' data-bs-target='#SecureMerchantsVendorDelete'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecureMerchantsVendorDelete'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecureMerchantsVendorDelete.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecureMerchantsVendorDelete'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            <a href='https://explorer.anddone.com/explorer/#/e/vendorapi-secure-merchants-vendors-delete-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/merchant-delete'); return false;">Run</button>
                            </form>
                            <form>
                                <button type='button' onclick="clearFunction(); return false;">Clear</button>
                            </form>
                        </div>
                    </div>

                    <div class='tab-pane {% if active_tab == "timeline" %}active{% endif %}' id='timeline' role='tabpanel' aria-labelledby='timeline-tab'>
                        <h3>Timeline</h3>
                        <p>Payload File: public\requests\SecureMerchantsVendorTimeline.json</p>
                        <button class="openModal" data-modal-id='SecureMerchantsVendorTimeline' type='button' data-bs-toggle='modal' data-bs-target='#SecureMerchantsVendorTimeline'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecureMerchantsVendorTimeline'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecureMerchantsVendorTimeline.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecureMerchantsVendorTimeline'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            <a href='https://explorer.anddone.com/explorer/#/e/vendorapi-secure-merchants-vendors-timeline-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/merchant-timeline'); return false;">Run</button>
                            </form>
                            <form>
                                <button type='button' onclick="clearFunction(); return false;">Clear</button>
                            </form>
                        </div>
                    </div>

                    <div class='tab-pane {% if active_tab == "edit" %}active{% endif %}' id='edit' role='tabpanel' aria-labelledby='edit-tab'>
                        <h3>Edit</h3>
                        <p>Payload File: public\requests\SecureMerchantsVendorEdit.json</p>
                        <button class="openModal" data-modal-id='SecureMerchantsVendorEdit' type='button' data-bs-toggle='modal' data-bs-target='#SecureMerchantsVendorEdit'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='SecureMerchantsVendorEdit'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            SecureMerchantsVendorEdit.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentSecureMerchantsVendorEdit'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            <a href='https://explorer.anddone.com/explorer/#/e/vendorapi-secure-merchants-vendors-edit-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction('/merchant-edit'); return false;">Run</button>
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

        var triggerEl = document.querySelector('#myTab a[href="#create"]')
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
                    text: "Merchant " 
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
