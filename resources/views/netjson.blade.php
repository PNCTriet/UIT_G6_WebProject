<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Netjson</title>
  <link rel="shortcut icon" type="image/png" href="img/Netjson.png">
  <link>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
  <script>
    hljs.highlightAll();
  </script>
  <link rel="stylesheet" href="css/style_netjson.css" />
</head>

<body>
  <div class="sidebar">
    <div class="logo">
      <img src="img/Netjson.png" alt="Netjson Logo">
      <h2>Netjson</h2>
    </div>
    <!-- Button for Dark Mode -->
    <button class="btn btn-primary" id="darkModeButton" onclick="toggleDarkMode()">
      Dark Mode
    </button>
    <div class="folder" id="folderTree"></div>
  </div>
  <div class="main-content">
    <div class="container">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#importJSON">Import JSON</a></li>
        <li><a data-toggle="tab" href="#callAPI">Call API</a></li>
        <li><a data-toggle="tab" href="#uploadExcel">Upload Excel</a></li>
        <li><a data-toggle="tab" href="#mergeJSON">Merge JSON</a></li>
      </ul>

      <div class="tab-content">
        <div id="importJSON" class="tab-pane fade in active">
          <h1>Import and Display JSON File</h1>
          <div class="file-upload">
            <label for="fileInput">Choose a Folder</label>
            <input type="file" id="fileInput" accept=".json" webkitdirectory directory multiple />
          </div>
          <textarea id="jsonEditor" class="editjson"></textarea>

          <p>Path test : /Applications/XAMPP/xamppfiles/htdocs/Netjson/source/json</p>
          <input type="text" id="savePathInput_importapi" placeholder="Enter file path...">
          <button class="btn btn-success" onclick="saveChanges()">
            Save Changes
          </button>
          <div class="output editjson" style="display: none;" id="output"></div>
        </div>

        <div id="callAPI" class="tab-pane fade">
          <h1>Call API</h1>
          <p>Key test : 123113d4a4822456c35fc67ce8dd0c16</p>
          <div class="file-upload">
            <div class="api-settings">
              <label for="endpointInput">Series ID</label>
              <input type="text" class="api-settings" id="id" />
              <label for="keyInput">API Key</label>
              <input type="text" class="api-settings" id="keyInput" />
            </div>
            <div class="api-settings">
              <label for="endpointSelect">Choose Endpoint</label>
              <select id="endpointSelect" class="api-settings">
                <option value="details">TV Show Details</option>
                <option value="videos">TV Show Videos</option>
                <option value="credits">TV Show Credits</option>
                <option value="images">TV Show Images</option>
              </select>
              <button id="callApiButton" class="btn btn-danger btn-lg">Call API</button>
            </div>
            <br />
            <textarea id="output_editapi" class="editjson"></textarea>
            <div id="area" class="editjson" style="height:fit-content;"></div>

            <div class="editjson" id="output_api" style="display: none;"></div>
          </div>
        </div>

        <div id="uploadExcel" class="tab-pane fade">
          <h1>Upload Excel and Call API</h1>
          <div class="file-upload">
            <label for="excelFileInput">Choose Excel File</label>
            <input type="file" id="excelFileInput" accept=".xlsx, .xls" />
          </div>
          <label for="endpointSelect1">Choose Endpoint</label>
          <select id="endpointSelect1" class="api-settings">
            <option value="details">TV Show Details</option>
            <option value="videos">TV Show Videos</option>
            <option value="credits">TV Show Credits</option>
            <option value="images">TV Show Images</option>
          </select>
          <!-- <button class="btn btn-primary" onclick="handleExcelUpload()">Upload and Call API</button> -->
          <div id="excelContent" class="editjson"></div>
          <p>Path test : /Applications/XAMPP/xamppfiles/htdocs/Netjson/source/json</p>
          <input type="text" id="savePathInput_excelapi" class="output" style="height: 25px;" placeholder="Enter file path..." required>
          <button class="btn btn-success" onclick="handleExcelUpload()">
            Call API & Store Data
          </button>
        </div>

        <div id="mergeJSON" class="tab-pane fade">
          <h1>Merge JSON Files</h1>
          <label for="mergeFileInput" id="mergeFileLabel">Select JSON files to merge</label>
          <input type="file" id="mergeFileInput" multiple>
          <button id="mergeButton">Merge JSON</button>
          <div id="outputmerge" class="editjson" style="height:fit-content"></div>
          <textarea id="mergedJSONEditor" class="editjson"></textarea>
          <p>Path test : /Applications/XAMPP/xamppfiles/htdocs/Netjson/source/json</p>
          <input type="text" id="savePathInput_mergeapi" style="color: black;" placeholder="Enter file path...">
          <input type="text" id="savePathName_mergeapi" style="color: black;" placeholder="Enter file name...">
          <button class="btn btn-success" onclick="saveChangesmerge()">
            Save Changes
          </button>
          <div id="mergeResult" style="display: none;" class="editjson"></div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
  <script src="js/script_netjson.js"></script>
</body>

</html>