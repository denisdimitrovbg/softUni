$(document).ready(function () {


    var clientId = '931667381451-11mr223flkic17una1mdrbl2l2vnphcq.apps.googleusercontent.com';
    var apiKey = 'AIzaSyBMqXp8JIvYo5n4hsi_VNKVb5xG-vSvzZ4';

    /* ------------------------------------------------------------ *\
                                  NAV
    \* ------------------------------------------------------------ */


    $("#tabstrip").kendoTabStrip({
        animation:  {
            open: {
                effects: "fadeIn"
            }
        }
    });

    /* ------------------------------------------------------------ *\
                                 INBOX
    \* ------------------------------------------------------------ */

    $("#inbox").kendoGrid({
        height: 550,
        sortable: false
    });

    $("#tableAppointments").kendoGrid({
        height: 550,
        sortable: false
    });

    $("#contacts").kendoGrid({
        height: 550,
        sortable: false
    });


    /* ------------------------------------------------------------ *\
                    Gmail
   \* ------------------------------------------------------------ */
  /*  var clientId = '931667381451-11mr223flkic17una1mdrbl2l2vnphcq.apps.googleusercontent.com';
    var apiKey = 'AIzaSyBMqXp8JIvYo5n4hsi_VNKVb5xG-vSvzZ4';
    var scopesGmail = 'https://www.googleapis.com/auth/gmail.readonly';

    function handleClientLoad() {
        gapi.client.setApiKey(apiKey);
        window.setTimeout(checkAuth, 1);
    }

    function checkAuth() {
        gapi.auth.authorize({
            client_id: clientId,
            scope: scopesGmail,
            immediate: true
        }, handleAuthResult);
    }

    function handleAuthClick() {
        gapi.auth.authorize({
            client_id: clientId,
            scope: scopesGmail,
            immediate: false
        }, handleAuthResult);
        return false;
    }

    function handleAuthResult(authResult) {
        if (authResult && !authResult.error) {
            loadGmailApi();
            $('#authorize-button').remove();
            $('.table-inbox').removeClass("hidden");
        } else {
            $('#authorize-button').removeClass("hidden");
            $('#authorize-button').on('click', function () {
                handleAuthClick();
            });
        }
    }

    function loadGmailApi() {
        gapi.client.load('gmail', 'v1', displayInbox);
    }

    function displayInbox() {
        var request = gapi.client.gmail.users.messages.list({
            'userId': 'me',
            'labelIds': 'INBOX',
            'maxResults': 10
        });

        request.execute(function (response) {
            $.each(response.messages, function () {
                var messageRequest = gapi.client.gmail.users.messages.get({
                    'userId': 'me',
                    'id': this.id
                });

                messageRequest.execute(appendMessageRow);
                console.log(messageRequest);
            });
        });
    }

    function appendMessageRow(message) {
        $('#inbox').append(
            '<tr>\
              <td>' + getHeader(message.payload.headers, 'From') + '</td>\
            <td>\
              <a href="#message-modal-' + message.id +
            '" data-toggle="modal" id="message-link-' + message.id + '">' +
            getHeader(message.payload.headers, 'Subject') +
            '</a>\
          </td>\
          <td>' + getHeader(message.payload.headers, 'Date') + '</td>\
          </tr>'
        );

        $('#single-message').append(
            '<div class="modal fade hidden" id="message-modal-' + message.id +
            '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">\
            <iframe class="iframe" id="message-iframe-' + message.id + '" srcdoc="">\
                  </iframe>\
          </div>'
        );

        $('#message-link-' + message.id).on('click', function () {

            var ifrm = $('#message-iframe-' + message.id)[0].contentWindow.document;
            $('body', ifrm).html(getBody(message.payload));
        });

        $('#message-link-' + message.id).on('click', function () {
            $('.modal.fade' + '#message-modal-' + message.id).siblings().addClass("hidden");
            $('.modal.fade' + '#message-modal-' + message.id).removeClass('hidden');
        });


    }

    function getHeader(headers, index) {
        var header = '';

        $.each(headers, function () {
            if (this.name === index) {
                header = this.value;
            }
        });
        return header;
    }

    function getBody(message) {
        var encodedBody = '';
        if (typeof message.parts === 'undefined') {
            encodedBody = message.body.data;
        } else {
            encodedBody = getHTMLPart(message.parts);
        }
        encodedBody = encodedBody.replace(/-/g, '+').replace(/_/g, '/').replace(/\s/g, '');
        return decodeURIComponent(escape(window.atob(encodedBody)));
    }

    function getHTMLPart(arr) {
        for (var x = 0; x <= arr.length; x++) {
            if (typeof arr[x].parts === 'undefined') {
                if (arr[x].mimeType === 'text/html') {
                    return arr[x].body.data;
                }
            } else {
                return getHTMLPart(arr[x].parts);
            }
        }
        return '';
    }
*/
    /* ------------------------------------------------------------ *\
                      Contacts
    \* ------------------------------------------------------------ */

    var scopesContact = 'https://www.googleapis.com/auth/contacts.readonly';

    $(document).on("click","#allContacts", function(){
        gapi.client.setApiKey(apiKey);
        window.setTimeout(authorize);
    });

    function authorize() {
        gapi.auth.authorize({client_id: clientId, scope: scopesContact, immediate: false}, handleAuthorization);
    }

    function handleAuthorization(authorizationResult) {
        if (authorizationResult && !authorizationResult.error) {
            $.get("https://www.google.com/m8/feeds/contacts/default/thin?alt=json&access_token=" + authorizationResult.access_token + "&max-results=500&v=3.0",
                function(response){
                    //process the response here
                    var contacts = response.feed.entry;
                    $.each(contacts, function(index,value){
                        var contactName = JSON.stringify(value.title.$t);
                        var phone = JSON.stringify(value.gd$phoneNumber[0].$t);
                        var picture = JSON.stringify(value.link[0].href);
                        var title = JSON.stringify(value.gd$organization[0].gd$orgTitle.$t);
                        var company = JSON.stringify(value.gd$organization[0].gd$orgName.$t);

                        $('#contactBody').append('<tr>\
                             <td><span class="photo" style="background-image: url('+picture+');"></span><span>' + contactName.replace(/['"]+/g, '') + '</span></td>\
                             <td><span>' + phone.replace(/['"]+/g, '') + '</span></td>\
                             <td><span>' + title.replace(/['"]+/g, '') + '</span></td>\
                             <td><span>' + contactName.replace(/['"]+/g, '') + '</span></td>\
                            </tr>'
                        );
                    });
                });
        }
    }


    /* ------------------------------------------------------------ *\
                        Events
    \* ------------------------------------------------------------ */
   /* var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

    // Authorization scopes required by the API; multiple scopes can be
    // included, separated by spaces.
    var scopresCalendar = "https://www.googleapis.com/auth/calendar.readonly";

    var authorizeButton = document.getElementById('authorize_button');
    /!*var signoutButton = document.getElementById('signout_button');*!/

    /!**
     *  On load, called to load the auth2 library and API client library.
     *!/
    function handleClientLoad() {
        gapi.load('client:auth2', initClient);
    }

    /!**
     *  Initializes the API client library and sets up sign-in state
     *  listeners.
     *!/
    function initClient() {
        gapi.client.init({
            apiKey: apiKey,
            clientId: clientId,
            discoveryDocs: DISCOVERY_DOCS,
            scope: scopresCalendar
        }).then(function () {
            // Listen for sign-in state changes.
            gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

            // Handle the initial sign-in state.
            updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
            authorizeButton.onclick = handleAuthClick;
            /!* signoutButton.onclick = handleSignoutClick;*!/
        }, function(error) {
            appendPre(JSON.stringify(error, null, 2));
        });
    }

    /!**
     *  Called when the signed in status changes, to update the UI
     *  appropriately. After a sign-in, the API is called.
     *!/
    function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
            authorizeButton.style.display = 'none';
            /!*signoutButton.style.display = 'block';*!/
            listUpcomingEvents();
        } else {
            authorizeButton.style.display = 'block';
            /!*signoutButton.style.display = 'none';*!/
        }
    }

    /!**
     *  Sign in the user upon button click.
     *!/
    function handleAuthClick(event) {
        gapi.auth2.getAuthInstance().signIn();
    }

    /!* /!**
      *  Sign out the user upon button click.
      *!/
     function handleSignoutClick(event) {
         gapi.auth2.getAuthInstance().signOut();
     }
 *!/
    /!**
     * Append a pre element to the body containing the given message
     * as its text node. Used to display the results of the API call.
     *
     * @param {string} message Text to be placed in pre element.
     *!/
    /!* function appendPre(message) {
         var pre = document.getElementById('content');
         var textContent = document.createTextNode(message + '\n');
         pre.appendChild(textContent);
     }*!/

    /!**
     * Print the summary and start datetime/date of the next ten events in
     * the authorized user's calendar. If no events are found an
     * appropriate message is printed.
     *!/
    function listUpcomingEvents() {
        gapi.client.calendar.events.list({
            'calendarId': 'primary',
            'timeMin': (new Date()).toISOString(),
            'showDeleted': false,
            'singleEvents': true,
            'maxResults': 10,
            'orderBy': 'startTime'
        }).then(function(response) {
            var events = response.result.items;

            /!*if (events.length > 0) {
                for (i = 0; i < events.length; i++) {
                    var event = events[i];
                    var eventDescription = event.summary;
                    var when = event.start.dateTime;
                    if (!when) {
                        when = event.start.date;
                    }
                }
            }*!/
            $.each(events, function(index,value){
                var statusE = JSON.stringify(value.status);
                var descpriptionE = JSON.stringify(value.summary);
                var startDateE = JSON.stringify(value.start.dateTime);
                var endDateE = JSON.stringify(value.end.dateTime);
                var organizerE = JSON.stringify(value.organizer.email);

                $('#contentEvents').append('<tr>\
                             <td><span>' + statusE.replace(/['"]+/g, '') + '</span></td>\
                             <td><span>' + descpriptionE.replace(/['"]+/g, '') + '</span></td>\
                             <td><span>' + startDateE.replace(/['"]+/g, '') + '</span></td>\
                             <td><span>' + endDateE.replace(/['"]+/g, '') + '</span></td>\
                             <td><span>' + organizerE.replace(/['"]+/g, '') + '</span></td>\
                            </tr>'
                );
            });

        });


    }
*/



});

/* ------------------------------------------------------------ *\
                   INFO
\* ------------------------------------------------------------ */
/*

email denis.motiontest@gmail.com - parolata ;
API-KEY - AIzaSyBMqXp8JIvYo5n4hsi_VNKVb5xG-vSvzZ4 ;
Client Id -931667381451-11mr223flkic17una1mdrbl2l2vnphcq.apps.googleusercontent.com ;



*/
