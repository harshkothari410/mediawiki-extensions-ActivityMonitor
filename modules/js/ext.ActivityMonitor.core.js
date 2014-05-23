/**
 * Core JS file for Extension:Activitymonitor.
 */

( function ( mw, $ ) {
	var socket = io.connect('stream.wmflabs.org/rc');
printObj({
  'event': 'connect',
  'messsage': 'Connecting to stream.wmflabs.org...'
});

socket.on('connect', function () {
  printObj({
    'event': 'connect',
    'messsage': 'Connection established!'
  });
  printObj({
    'event': 'subscribe',
    'topic': '*',
    'messsage': 'Listening to all wikis...'
  });
  socket.emit('subscribe', '*');
});

socket.on('change', function (rc) {
  printChangeObj(rc);
});

function printChangeObj(rc) {
  var element = formatObj(rc);
  var linkRow = document.createElement('tr');
  var linkHead = document.createElement('th');
  linkHead.appendChild(document.createTextNode('links'));
  linkRow.appendChild(linkHead);
  linkRow.appendChild(formatLinks(getLinks(rc)));
  element.appendChild(linkRow);
  document.body.insertBefore(element, document.body.firstChild);
}

function printObj(obj) {
  var element = formatObj(obj);
  document.body.insertBefore(element, document.body.firstChild);
}

function formatObj(obj) {
  var key, td, th, tr, table;
  if (obj !== Object(obj)) {
    return document.createTextNode(obj);
  }
  table = document.createElement( 'table' );
  for (key in obj) {
    tr = document.createElement( 'tr' );
    th = document.createElement( 'th' );
    th.appendChild(document.createTextNode(key));
    td = document.createElement( 'td' );
    td.appendChild(formatObj(obj[key]));
    tr.appendChild(th);
    tr.appendChild(td);
    table.appendChild(tr);
  }
  return table;
}

function formatLinks(links) {
  var td = document.createElement('td');
  var a;
  for (var key in links) {
    a = document.createElement('a');
    a.href = links[key];
    a.appendChild(document.createTextNode(key));
    td.appendChild(a);
    td.appendChild(document.createTextNode(' '));
  }
  return td;
}

var RC_EDIT = 0;
var RC_NEW = 1;
var RC_LOG = 3;

function getLinks(rc) {
    var baseurl = rc.server_url + rc.server_script_path + '/index.php';
    var links = {};
    links.page = baseurl + '?' + $.param({ title: rc.title, redirect: 'no' });

    if (rc.type === RC_EDIT || rc.type === RC_NEW) {
        links.hist = baseurl + '?' + $.param({ title: rc.title, action: 'history' });
        if (rc.type === RC_EDIT && rc.revision) {
            links.diff = baseurl + '?' + $.param({ title: rc.title, diff: rc.revision.new, oldid: rc.revision.old });
        }
    }
    if (rc.type === RC_LOG) {
        links.log = baseurl + '?' + $.param({ title: 'Special:Log', type: rc.log_type });
    }

    return links;
}

}( mediaWiki, jQuery ) );
