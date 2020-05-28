var request = require('request');
headers = {
   "In-Progress": false,
   "On-behalf-of": USER_NAME
}
var options = {
   url: SWORD_URL,
   method: 'POST',
   auth: {
      user: 'test_ws',
      pass: 'test'
   },
   headers: headers,
   multipart: [{
      'content-type': 'application/atom+xml; charset="utf-8"',
      'content-disposition': 'attachment; name=atom',
      body: '<entry><dc:title>My Title</dc:title></entry>'
   }, {
      'content-type': 'application/zip',
      'content-disposition': 'attachment; name=payload; filename=' + FILENAME,
      'Content-Transfer-Encoding': 'base64',
      'Packaging': 'http://purl.org/net/sword/package/SimpleZip',
      'Content-MD5': utils.checksum(FILE),
      body: utils.base64_encode(FILE)
   }]
};
request(options, next);