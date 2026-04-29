<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/styles.css')}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>

    <title>API Explorer</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

</head>
<script>
    function runFunction() {
        document.body.style.cursor = 'wait';
        $.ajax({
            type: "GET"
            , url: '/cancellations-cancel'
        }).done(function(msg) {
            if (typeof msg === 'string') {
                if (msg == "Cancelled") {
                    const displayElement = document.getElementById("json-display");
                    displayElement.innerHTML = "<pre>Cancelled</pre>"; // Display in a <pre> tag

                    const respCode = document.getElementById('status');
                    respCode.innerHTML = "Success";
                } else {
                    const jsonObject = JSON.parse(msg);
                    if (jsonObject.message) {
                        const formattedJson = JSON.stringify(jsonObject, null, 2);
                        const displayElement = document.getElementById("json-display");
                        displayElement.innerHTML = "<pre>" + formattedJson + "</pre>"; // Display in a <pre> tag

                        const respCode = document.getElementById('status');
                        respCode.innerHTML = "Bad Request";
                    } else {
                        const formattedJson = JSON.stringify(jsonObject, null, 2);
                        const displayElement = document.getElementById("json-display");
                        displayElement.innerHTML = "<pre>" + formattedJson + "</pre>"; // Display in a <pre> tag

                        const respCode = document.getElementById('status');
                        respCode.innerHTML = "Success";
                    }

                }
            }

            document.body.style.cursor = 'default';
        });
    }

    function clearFunction() {
        const displayElement = document.getElementById("json-display");
        displayElement.innerHTML = "";
        const respCode = document.getElementById('status');
        respCode.innerHTML = "";
    }

    function viewPayloadFunction() {
        fetch("/requests/CancellationsPayment.json")
            .then((res) => res.text())
            .then((text) => {
                const jsonFile = document.getElementById('jsonFile');
                jsonFile.value = text;
            })
            .catch((e) => console.error(e));
        $('#payloadModal').modal('show')
    }

</script>
<body>
    <!-- Side navigation -->
    <div class='container-fluid'>
        <div class='row flex-nowrap'>
            @include('mainmenu')
            <div class='vstack content-container'>
                <h3>Cancellations</h3>
                <div>
                    <ul class='nav nav-tabs' id='myTab' role='tablist'>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link {% if active_tab == "void" %}active{% endif %}' id='void-tab' data-toggle='tab' href='#void' role='tab' aria-controls='void' aria-selected='true'>Cancel Transaction</a>
                        </li>
                    </ul>
                </div>

                <div class='tab-content'>
                    <div class='tab-pane active' id='void' role='tabpanel' aria-labelledby='void-tab'>
                        <h3>Cancel Transaction</h3>
                        <p>Payload File: public\Requests\CancellationsPayment.json</p>
                        <button class="openModal" data-modal-id='CancellationsPayment' type='button' data-bs-toggle='modal' data-bs-target='#CancellationsPayment'>
                            View Payload Contents
                        </button>
                        <!-- Modal HTML -->
                        <div class='modal fade' id='CancellationsPayment'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>
                                            CancellationsPayment.json
                                        </h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        </button>
                                    </div>
                                    <div id='modalContentCancellationsPayment'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            <a href='https://explorer.anddone.com/#/e/secure-cancellations-post' target='_blank'>API Endpoint Documentation</a></p>
                        <br />
                        <div class='hstack'>
                            <form>
                                <button type='button' onclick="runFunction(); return false;">Run</button>
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
                    </tr>
                    <tr>
                        <td style="padding-right:40px;">
                            <div id='json-display' class='overflow-auto' style='width: 500px; height: 400px'></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script>
        const jsonString = '{}'; // Get the string from Django context
        const jsonResp = document.getElementById('json-display');
        jsonResp.value = JSON.stringify(jsonObject, null, 2)
        try {

            const jsonObject = JSON.parse(jsonString); // Parse the string into a JavaScript object
            const formattedJson = JSON.stringify(jsonObject, null, 2); // Format the JSON with indentation

            const displayElement = document.getElementById("json-display");
            displayElement.innerHTML = "<pre>" + formattedJson + "</pre>"; // Display in a <pre> tag
        } catch (error) {
            console.log(jsonString);
            const displayElement = document.getElementById("json-display");
            displayElement.innerHTML = "<pre>" + jsonString + "</pre>";
        }

    </script>
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
                data.style.display = 'none'
                tree.style.display = 'none'
            })
        })

        var triggerEl = document.querySelector('#myTab a[href="#void"]')
        $('[id="void"]').addClass("active")
        $('[id="void-tab"]').addClass("active")

    </script>
    <script>
        $(function() {
            var stringData = '';
            if (stringData != '') {
                var jsonData = JSON.parse(stringData);
            }
            const jsTreeData = convertJsonToJsTree(jsonData);

            $('#tree').jstree({
                'core': {
                    'data': jsTreeData
                }
            });
        });

function convertJsonToJsTree(data) {

    if (Array.isArray(data)) {
        return data.map((item, index) => ({
            text: "Cancellation ",
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

                fetch("/requests/CancellationsPayment.json")
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
