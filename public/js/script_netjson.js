document.getElementById("callApiButton").addEventListener("click", function () {
    const endpoint = document.getElementById("endpointSelect").value;
    const key = document.getElementById("keyInput").value;
    const id = document.getElementById("id").value;
    callAPI(id, key, endpoint);
  });
  
  document
    .getElementById("fileInput")
    .addEventListener("change", function (event) {
      const files = event.target.files;
      if (files && files.length > 0) {
        displayFolderContents(files);
  
        // Hiển thị nội dung của tệp JSON khi nó được chọn
        displayJSONFile(files[0]);
      } else {
        alert("Please select a folder containing JSON files.");
      }
    });
  
  function displayFolderContents(files) {
    const jsonFiles = [];
    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      if (file.type === "application/json") {
        jsonFiles.push(file);
      }
    }
    if (jsonFiles.length === 0) {
      alert("No JSON files found in the selected folder.");
      return;
    }
    const folderTree = document.getElementById("folderTree");
    folderTree.innerHTML = "";
    const ul = document.createElement("ul");
    ul.classList.add("tree");
    jsonFiles.forEach((file) => {
      const li = document.createElement("li");
      const span = document.createElement("span");
      span.innerText = file.name;
      span.addEventListener("click", function () {
        displayJSONFile(file);
      });
      li.appendChild(span);
      ul.appendChild(li);
    });
    folderTree.appendChild(ul);
  }
  
  function displayJSONFile(file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      try {
        const json = JSON.parse(e.target.result);
        displayJSON(json);
      } catch (error) {
        
      }
    };
    reader.readAsText(file);
  }
  
  function displayJSON(json) {
    const outputDiv = document.getElementById("output");
    outputDiv.innerHTML = "<pre>" + JSON.stringify(json, null, 4) + "</pre>";
    hljs.highlightElement(document.getElementById("jsonEditor").value = JSON.stringify(json, null, 2));
  }
  
  function displayJSON_API(data, endpoint) {
    const outputDiv = document.getElementById("area");
    outputDiv.innerHTML = "";
    if (endpoint === "details") {
      outputDiv.innerHTML = formatDetails(data);
    } else if (endpoint === "videos") {
      outputDiv.innerHTML = formatVideos(data.results);
    } else if (endpoint === "credits") {
      outputDiv.innerHTML = formatCredits(data.cast);
    } else if (endpoint === "images") {
      outputDiv.innerHTML = formatImages(data.backdrops);
    }
    document.getElementById("output_editapi").value = JSON.stringify(
      data,
      null,
      4
    );
  }
  
  function formatDetails(data) {
    return `
          <h2>${data.name}</h2>
          <p><strong>Overview:</strong> ${data.overview}</p>
          <p><strong>First Air Date:</strong> ${data.first_air_date}</p>
          <p><strong>Genres:</strong> ${data.genres
            .map((genre) => genre.name)
            .join(", ")}</p>
          <p><strong>Original Language:</strong> ${data.original_language}</p>
          <p><strong>Vote Average:</strong> ${data.vote_average}</p>
          <p><strong>Vote Count:</strong> ${data.vote_count}</p>
          <p><strong>Popularity:</strong> ${data.popularity}</p>
          <img src="https://image.tmdb.org/t/p/w500${data.poster_path}" alt="${
      data.name
    } poster">
      `;
  }
  
  function formatVideos(videos) {
    if (videos.length === 0) {
      return "<p>No videos available.</p>";
    }
    const video = videos.find(
      (video) => video.site === "YouTube" && video.type === "Trailer"
    );
    if (!video) {
      return "<p>No trailers available.</p>";
    }
    return `<iframe width="560" height="315" src="https://www.youtube.com/embed/${video.key}" frameborder="0" allowfullscreen></iframe>`;
  }
  
  function formatCredits(cast) {
    if (cast.length === 0) {
      return "<p>No cast information available.</p>";
    }
    const slides = cast
      .map(
        (actor) => `
          <div class="slide ${actor === cast[0] ? "active" : ""}">
              <div class="cast-member">
                  <img src="https://image.tmdb.org/t/p/w200${
                    actor.profile_path
                  }" alt="${actor.name}">
                  <p><strong>${actor.name}</strong> as ${actor.character}</p>
              </div>
          </div>
      `
      )
      .join("");
    return `
          <h2>Cast</h2>
          <div class="slider">
              ${slides}
              <div class="controls">
                  <div class="control-left">&lt;</div>
                  <div class="control-right">&gt;</div>
              </div>
          </div>
      `;
  }
  
  function formatImages(backdrops) {
    if (backdrops.length === 0) {
      return "<p>No images available.</p>";
    }
    const slides = backdrops
      .map(
        (image) => `
          <div class="slide ${image === backdrops[0] ? "active" : ""}">
              <img src="https://image.tmdb.org/t/p/w780${
                image.file_path
              }" alt="Backdrop">
          </div>
      `
      )
      .join("");
    return `
          <h2>Images</h2>
          <div class="slider">
              ${slides}
              <div class="controls">
                  <div class="control-left">&lt;</div>
                  <div class="control-right">&gt;</div>
              </div>
          </div>
      `;
  }
  
  // Slider control logic
  document.addEventListener("click", function (event) {
    if (
      event.target.classList.contains("control-left") ||
      event.target.classList.contains("control-right")
    ) {
      const slider = event.target.closest(".slider");
      const slides = slider.querySelectorAll(".slide");
      let activeIndex = Array.from(slides).findIndex((slide) =>
        slide.classList.contains("active")
      );
      slides[activeIndex].classList.remove("active");
  
      if (event.target.classList.contains("control-left")) {
        activeIndex = activeIndex === 0 ? slides.length - 1 : activeIndex - 1;
      } else {
        activeIndex = activeIndex === slides.length - 1 ? 0 : activeIndex + 1;
      }
  
      slides[activeIndex].classList.add("active");
    }
  });
  
  // ========================================================================================
  
  document.getElementById("callApiButton").addEventListener("click", function () {
    const seriesId = document.getElementById("endpointInput").value;
    const key = document.getElementById("keyInput").value;
    const endpointType = document.getElementById("endpointSelect").value;
    callAPI(seriesId, key, endpointType);
  });
  
  document.getElementById("callApiButton").addEventListener("click", function () {
    const seriesId = document.getElementById("endpointInput").value;
    const apiKey = document.getElementById("keyInput").value;
    const selectedEndpoint = document.getElementById("endpointSelect").value;
    callAPI(seriesId, apiKey, selectedEndpoint);
  });
  
  function callAPI(seriesId, apiKey, endpoint) {
    let url = "";
  
    switch (endpoint) {
      case "details":
        url = `https://api.themoviedb.org/3/tv/${seriesId}?api_key=${apiKey}`;
        break;
      case "videos":
        url = `https://api.themoviedb.org/3/tv/${seriesId}/videos?api_key=${apiKey}`;
        break;
      case "credits":
        url = `https://api.themoviedb.org/3/tv/${seriesId}/credits?api_key=${apiKey}`;
        break;
      case "images":
        url = `https://api.themoviedb.org/3/tv/${seriesId}/images?api_key=${apiKey}`;
        break;
      default:
        console.error("Unknown endpoint selected");
        return;
    }
  
    fetch(url)
      .then((response) => response.json())
      .then((data) => displayJSON_API(data, endpoint))
      .catch((error) => console.error("Error calling API:", error));
  }
  
  function saveChanges() {
    const updatedJson = document.getElementById("jsonEditor").value;
    try {
      const parsedJson = JSON.parse(updatedJson); // Kiểm tra JSON hợp lệ
      //console.log(parsedJson);
      // Đường dẫn thư mục chứa các tệp JSON trên máy chủ của bạn
  
      const directoryPath = document.getElementById(
        "savePathInput_importapi"
      ).value;
      // const directoryPath =
      //   "/Applications/XAMPP/xamppfiles/htdocs/Netjson/source/json";
  
      // Tạo tên tệp mới dựa trên thời gian hiện tại
      // const currentDate = new Date();
      // const fileName = "json_" + currentDate.getTime() + ".json"; // Ví dụ: json_1622640678655.json
      // Lấy tên tệp đang mở hiện tại từ đối tượng input file
  
      const currentFileName = document.getElementById("fileInput").files[0].name;
      console.log(currentFileName);
      // Đường dẫn đầy đủ đến tệp JSON trên máy chủ của bạn
      const filePath = directoryPath + "/" + currentFileName;
      console.log(filePath);
      // Gửi yêu cầu POST để lưu dữ liệu JSON vào tệp
      updateJsonFile(updatedJson, filePath);
    } catch (error) {
      alert("Invalid JSON");
    }
  }
  
  function updateJsonFile(jsonData, filePath) {
    console.log(jsonData);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "updatejson.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onload = function () {
      if (xhr.status === 200) {
        alert("File updated successfully");
      } else {
        alert("Error updating file");
      }
    };
  
    const requestData = {
      json: jsonData,
      filePath: filePath,
    };
  
    xhr.send(JSON.stringify(requestData));
  }
  function toggleDarkMode() {
    // Lấy thẻ <body> của trang
    const body = document.body;
  
    // Kiểm tra xem trang có đang ở chế độ Dark Mode hay không
    if (body.classList.contains("dark-mode")) {
      // Nếu có, loại bỏ lớp 'dark-mode' để chuyển sang Light Mode
      body.classList.remove("dark-mode");
    } else {
      // Nếu không, thêm lớp 'dark-mode' để chuyển sang Dark Mode
      body.classList.add("dark-mode");
    }
  }
  // ==============================================================
  // New functions for handling Excel file upload
  const excelFileInput = document.getElementById("excelFileInput");
  excelFileInput.addEventListener("change", displayfirst);
  let row1;
  let rows;
  
  function displayfirst() {
    const file = excelFileInput.files[0];
  
    const reader = new FileReader();
    reader.onload = function (e) {
      const data = new Uint8Array(e.target.result);
      const workbook = XLSX.read(data, { type: "array" });
      const sheetName = workbook.SheetNames[0];
      const sheet = workbook.Sheets[sheetName];
      row1 = XLSX.utils.sheet_to_json(sheet, { header: 1 });
      rows = row1;
      // If "Status" column does not exist, add it
      if (!row1[0].includes("Status")) {
        row1[0].push("Status");
        row1.forEach((row, index) => {
          if (index === 0) return; // Skip header row
          row.push("Ready"); // Initialize status as "Ready" if the column was missing
        });
      }
  
      displayExcelContent(row1);
    };
    reader.readAsArrayBuffer(file);
  }
  
  function handleExcelUpload() {
    const excelFileInput = document.getElementById("excelFileInput");
    const file = excelFileInput.files[0];
    if (!file) {
      alert("Please upload an Excel file.");
      return;
    }
    const reader = new FileReader();
    reader.onload = function (e) {
      const data = new Uint8Array(e.target.result);
      const workbook = XLSX.read(data, { type: "array" });
      const sheetName = workbook.SheetNames[0];
      const sheet = workbook.Sheets[sheetName];
      // let rows = XLSX.utils.sheet_to_json(sheet, { header: 1 });
  
      // Add "status" column header
      rows[0].push("Status");
      displayExcelContent(rows); // Display the content of the Excel file
  
      const apiKey = "123113d4a4822456c35fc67ce8dd0c16";
      const selectedEndpoint = document.getElementById("endpointSelect1").value;
      const outputFolderPath = document.getElementById("savePathInput_excelapi").value;
  
      savePathInput_excelapi
      rows.forEach((row, index) => {
        if (index === 0) return; // Skip header row
        row.push("Pending"); // Initialize status as "Pending"
        const [stt, movieName, seriesId, status] = row;
        callAPIAndSave(
          seriesId,
          apiKey,
          selectedEndpoint,
          movieName,
          outputFolderPath,
          index
        ); // Pass the index
      });
    };
    reader.readAsArrayBuffer(file);
  }
  
  // function displayExcelContent(rows) {
  //   const excelContentDiv = document.getElementById("excelContent");
  //   excelContentDiv.innerHTML = "";
  
  //   const table = document.createElement("table");
  //   table.classList.add("table", "table-bordered");
  
  //   const thead = document.createElement("thead");
  //   const headerRow = document.createElement("tr");
  //   headerRow.innerHTML =
  //     "<th>STT</th><th>Movie Name</th><th>Series ID</th><th>Status</th>";
  //   thead.appendChild(headerRow);
  //   table.appendChild(thead);
  
  //   const tbody = document.createElement("tbody");
  //   rows.forEach((row, index) => {
  //     if (index === 0) return; // Skip header row
  
  //     // Check if the row has enough elements
  //     if (row.length < 3) {
  //       console.error(`Row ${index} does not have enough elements.`);
  //       return;
  //     }
  
  //     const [stt, movieName, seriesId, status] = row;
  
  //     const rowElement = document.createElement("tr");
  //     rowElement.innerHTML = `<td>${index}</td><td>${movieName}</td><td>${seriesId}</td><td class="status-cell">${status}</td>`;
  //     rowElement.dataset.rowIndex = index; // Add data attribute for row index
  
  //     tbody.appendChild(rowElement);
  //   });
  //   table.appendChild(tbody);
  
  //   excelContentDiv.appendChild(table);
  // }
  
  function displayExcelContent(rows) {
    const excelContentDiv = document.getElementById("excelContent");
    excelContentDiv.innerHTML = "";
  
    const table = document.createElement("table");
    table.classList.add("table", "table-bordered");
  
    const thead = document.createElement("thead");
    const headerRow = document.createElement("tr");
    headerRow.innerHTML =
      "<th>STT</th><th>Movie Name</th><th>Series ID</th><th>Status</th>";
    thead.appendChild(headerRow);
    table.appendChild(thead);
  
    const tbody = document.createElement("tbody");
    rows.forEach((row, index) => {
      if (index === 0) return; // Skip header row
  
      // Check if the row has enough elements
      if (row.length < 3) {
        console.error(`With ${row.length} Row ${index} does not have enough elements.`);
        return;
      }
  
      const [stt, movieName, seriesId, status] = row;
  
      const rowElement = document.createElement("tr");
      rowElement.innerHTML = `<td>${index}</td><td>${movieName}</td><td>${seriesId}</td><td class="status-cell">${status}</td>`;
      rowElement.dataset.rowIndex = index; // Add data attribute for row index
  
      // Set background color based on status
  const statusCell = rowElement.querySelector(".status-cell");
  if (status && typeof status === "string") { // Kiểm tra xem status có tồn tại và là một chuỗi không
      switch (status.toLowerCase()) {
          case "finish":
              statusCell.style.backgroundColor = "lightgreen";
              break;
          case "error":
              statusCell.style.backgroundColor = "lightcoral";
              break;
          case "pending":
              statusCell.style.backgroundColor = "lightyellow";
              break;
          case "ready":
              statusCell.style.backgroundColor = "lightblue";
              break;
          default:
              // For other statuses, no background color applied
              break;
      }
  } else {
      console.error("Status is not defined or not a string.");
  }
  
  
      tbody.appendChild(rowElement);
    });
    table.appendChild(tbody);
  
    excelContentDiv.appendChild(table);
  }
  
  function callAPIAndSave(
    seriesId,
    apiKey,
    endpoint,
    movieName,
    outputFolderPath,
    rowIndex
  ) {
    let url = "";
  
    switch (endpoint) {
      case "details":
        url = `https://api.themoviedb.org/3/tv/${seriesId}?api_key=${apiKey}`;
        break;
      case "videos":
        url = `https://api.themoviedb.org/3/tv/${seriesId}/videos?api_key=${apiKey}`;
        break;
      case "credits":
        url = `https://api.themoviedb.org/3/tv/${seriesId}/credits?api_key=${apiKey}`;
        break;
      case "images":
        url = `https://api.themoviedb.org/3/tv/${seriesId}/images?api_key=${apiKey}`;
        break;
      default:
        console.error("Unknown endpoint selected");
        return;
    }
  
    fetch(url)
      .then((response) => response.json())
      .then((data) => {
        const jsonData = JSON.stringify(data, null, 4);
        const filePath = `${outputFolderPath}/${seriesId}_${endpoint}.json`;
        saveJsonToFile(jsonData, filePath, rowIndex);
      })
      .catch((error) => {
        console.error("Error calling API:", error);
        updateStatus(rowIndex, "Error");
      });
  }
  
  function saveJsonToFile(jsonData, filePath, rowIndex) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "updatejson.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onload = function () {
      if (xhr.status === 200) {
        setTimeout(() => updateStatus(rowIndex, "Finish"), 1000); // Delay for 1 second before updating status
        console.log("File saved successfully");
      } else {
        console.error("Error saving file");
        updateStatus(rowIndex, "Error");
      }
    };
  
    const requestData = {
      json: jsonData,
      filePath: filePath,
    };
  
    xhr.send(JSON.stringify(requestData));
  }
  function updateStatus(rowIndex, status) {
      const table = document.querySelector("#excelContent table");
      const rowElement = table.querySelector(`tr[data-row-index="${rowIndex}"]`);
      if (rowElement) {
        const statusCell = rowElement.querySelector(".status-cell");
        statusCell.textContent = status;
        if (status.toLowerCase() === "finish") {
          statusCell.style.backgroundColor = "lightgreen";
        } else if (status.toLowerCase() === "error") {
          statusCell.style.backgroundColor = "lightcoral"; // Sửa thành màu hợp lệ
        } else if (status.toLowerCase() === "pending") {
          statusCell.style.backgroundColor = "lightyellow";
        } else if (status.toLowerCase() === "ready") {
          statusCell.style.backgroundColor = "lightblue";
        }
      }
    }
  
  // New functions for handling Excel file upload
  // const excelFileInput = document.getElementById("excelFileInput");
  // excelFileInput.addEventListener("change", displayfirst);
  
  // function displayfirst() {
  //   const file = excelFileInput.files[0];
  
  //   const reader = new FileReader();
  //   reader.onload = function (e) {
  //     const data = new Uint8Array(e.target.result);
  //     const workbook = XLSX.read(data, { type: "array" });
  //     const sheetName = workbook.SheetNames[0];
  //     const sheet = workbook.Sheets[sheetName];
  //     let rows = XLSX.utils.sheet_to_json(sheet, { header: 1 });
  //     let row1 = rows;
  //     // If "Status" column does not exist, add it
  //     if (!row1[0].includes("Status")) {
  //       row1[0].push("Status");
  //       row1.forEach((row, index) => {
  //         if (index === 0) return; // Skip header row
  //         row.push("Ready"); // Initialize status as "Ready" if the column was missing
  //       });
  //     }
  
  //     displayExcelContent(row1);
  //   };
  //   reader.readAsArrayBuffer(file);
  // }
  
  // function handleExcelUpload() {
  //   document.getElementById("excelContent").innerHTML = "";
  //   const file = excelFileInput.files[0];
  //   if (!file) {
  //     alert("Please upload an Excel file.");
  //     return;
  //   }
  //   const reader = new FileReader();
  //   reader.onload = function (e) {
  //     // const data = new Uint8Array(e.target.result);
  //     // const workbook = XLSX.read(data, { type: "array" });
  //     // const sheetName = workbook.SheetNames[0];
  //     // const sheet = workbook.Sheets[sheetName];
  //     // let rows = XLSX.utils.sheet_to_json(sheet, { header: 1 });
  
  //     // Display the content of the Excel file
  //     displayExcelContent(rows);
  
  //     const apiKey = "123113d4a4822456c35fc67ce8dd0c16";
  //     const selectedEndpoint = document.getElementById("endpointSelect1").value;
  //     const outputFolderPath = document.getElementById("savePathInput_excelapi").value;
  
  //     rows.forEach((row, index) => {
  //       if (index === 0) return; // Skip header row
  //       updateStatus(index, "Pending"); // Set status to "Pending"
  //       const [stt, movieName, seriesId, status] = row;
  //       callAPIAndSave(
  //         seriesId,
  //         apiKey,
  //         selectedEndpoint,
  //         movieName,
  //         outputFolderPath,
  //         index
  //       ); // Pass the index
  //     });
  //   };
  //   reader.readAsArrayBuffer(file);
  // }
  
  // function displayExcelContent(rows) {
  //   const excelContentDiv = document.getElementById("excelContent");
  //   excelContentDiv.innerHTML = "";
  
  //   const table = document.createElement("table");
  //   table.classList.add("table", "table-bordered");
  
  //   const thead = document.createElement("thead");
  //   const headerRow = document.createElement("tr");
  //   headerRow.innerHTML =
  //     "<th>STT</th><th>Movie Name</th><th>Series ID</th><th>Status</th>";
  //   thead.appendChild(headerRow);
  //   table.appendChild(thead);
  
  //   const tbody = document.createElement("tbody");
  //   rows.forEach((row, index) => {
  //     if (index === 0) return; // Skip header row
  
  //     // Check if the row has enough elements
  //     if (row.length < 3) {
  //       console.error(`With ${row.length} Row ${index} does not have enough elements.`);
  //       return;
  //     }
  
  //     const [stt, movieName, seriesId, status] = row;
  
  //     const rowElement = document.createElement("tr");
  //     rowElement.innerHTML = `<td>${index}</td><td>${movieName}</td><td>${seriesId}</td><td class="status-cell">${status}</td>`;
  //     rowElement.dataset.rowIndex = index; // Add data attribute for row index
  
  //     // Set background color based on status
  // const statusCell = rowElement.querySelector(".status-cell");
  // if (status && typeof status === "string") { // Kiểm tra xem status có tồn tại và là một chuỗi không
  //     switch (status.toLowerCase()) {
  //         case "finish":
  //             statusCell.style.backgroundColor = "lightgreen";
  //             break;
  //         case "error":
  //             statusCell.style.backgroundColor = "lightcoral";
  //             break;
  //         case "pending":
  //             statusCell.style.backgroundColor = "lightyellow";
  //             break;
  //         case "ready":
  //             statusCell.style.backgroundColor = "lightblue";
  //             break;
  //         default:
  //             // For other statuses, no background color applied
  //             break;
  //     }
  // } else {
  //     console.error("Status is not defined or not a string.");
  // }
  
  
  //     tbody.appendChild(rowElement);
  //   });
  //   table.appendChild(tbody);
  
  //   excelContentDiv.appendChild(table);
  // }
  
  // function callAPIAndSave(
  //   seriesId,
  //   apiKey,
  //   endpoint,
  //   movieName,
  //   outputFolderPath,
  //   rowIndex
  // ) {
  //   let url = "";
  
  //   switch (endpoint) {
  //     case "details":
  //       url = `https://api.themoviedb.org/3/tv/${seriesId}?api_key=${apiKey}`;
  //       break;
  //     case "videos":
  //       url = `https://api.themoviedb.org/3/tv/${seriesId}/videos?api_key=${apiKey}`;
  //       break;
  //     case "credits":
  //       url = `https://api.themoviedb.org/3/tv/${seriesId}/credits?api_key=${apiKey}`;
  //       break;
  //     case "images":
  //       url = `https://api.themoviedb.org/3/tv/${seriesId}/images?api_key=${apiKey}`;
  //       break;
  //     default:
  //       console.error("Unknown endpoint selected");
  //       return;
  //   }
  
  //   fetch(url)
  //     .then((response) => response.json())
  //     .then((data) => {
  //       const jsonData = JSON.stringify(data, null, 4);
  //       const filePath = `${outputFolderPath}/${seriesId}_${endpoint}.json`;
  //       saveJsonToFile(jsonData, filePath, rowIndex);
  //     })
  //     .catch((error) => {
  //       console.error("Error calling API:", error);
  //       updateStatus(rowIndex, "Error");
  //     });
  // }
  
  // function saveJsonToFile(jsonData, filePath, rowIndex) {
  //   const xhr = new XMLHttpRequest();
  //   xhr.open("POST", "updatejson.php", true);
  //   xhr.setRequestHeader("Content-Type", "application/json");
  //   xhr.onload = function () {
  //     if (xhr.status === 200) {
  //       console.log("File saved successfully");
  //       setTimeout(() => updateStatus(rowIndex, "Finish"), 1000); // Delay for 1 second before updating status
  //     } else {
  //       console.error("Error saving file");
  //       updateStatus(rowIndex, "Error");
  //     }
  //   };
  
  //   const requestData = {
  //     json: jsonData,
  //     filePath: filePath,
  //   };
  
  //   xhr.send(JSON.stringify(requestData));
  // }
  
  // function updateStatus(rowIndex, status) {
  //   const table = document.querySelector("#excelContent table");
  //   const rowElement = table.querySelector(`tr[data-row-index="${rowIndex}"]`);
  //   if (rowElement) {
  //     const statusCell = rowElement.querySelector(".status-cell");
  //     statusCell.textContent = status;
  //     if (status.toLowerCase() === "finish") {
  //       statusCell.style.backgroundColor = "lightgreen";
  //     } else if (status.toLowerCase() === "error") {
  //       statusCell.style.backgroundColor = "lightcoral"; // Sửa thành màu hợp lệ
  //     } else if (status.toLowerCase() === "pending") {
  //       statusCell.style.backgroundColor = "lightyellow";
  //     } else if (status.toLowerCase() === "ready") {
  //       statusCell.style.backgroundColor = "lightblue";
  //     }
  //   }
  // }
  
  
  // ============================================================================================================
  // JavaScript for the merge JSON feature
  let mergedFileName = "merged_json_file.json"; // Biến toàn cục để lưu tên tệp đã hợp nhất
  document.getElementById("mergeButton").addEventListener("click", function () {
    const files = document.getElementById("mergeFileInput").files;
    if (files.length < 2) {
      alert("Please select at least two JSON files to merge.");
      return;
    }
  
    const mergedJSON = {};
    let filesRead = 0;
    let totalLines = 0;
    let totalSize = 0;
  
    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      totalSize += file.size;
      const reader = new FileReader();
      reader.onload = function (e) {
        try {
          const data = JSON.parse(e.target.result);
          const fileName = file.name.replace(/\.[^/.]+$/, ""); // Remove file extension
          mergedJSON[fileName] = data;
          filesRead++;
  
          // Count lines in the file
          const lines = e.target.result.split(/\r\n|\r|\n/).length;
          totalLines += lines;
  
          // When all files are read, display the merged result and additional info
          if (filesRead === files.length) {
            displayMergedJSON(mergedJSON, files.length, totalLines, totalSize);
          }
        } catch (error) {
          console.error("Error parsing JSON from file", file.name, ":", error);
        }
      };
      reader.readAsText(file);
    }
  });
  
  function displayMergedJSON(mergedJSON, fileCount, totalLines, totalSize) {
    const mergeResultDiv = document.getElementById("mergeResult");
    const mergeContainerDiv = document.getElementById("outputmerge");
    mergeContainerDiv.innerHTML = `<p><strong>Number of files merged:</strong> ${fileCount}</p>
    <p><strong>Total lines:</strong> ${totalLines}</p>
    <p><strong>Total size:</strong> ${(totalSize / 1024).toFixed(2)} KB</p>
    `;
    mergeResultDiv.innerHTML =
      "<pre>" + JSON.stringify(mergedJSON, null, 4) + "</pre>";
    document.getElementById("mergedJSONEditor").value = JSON.stringify(
      mergedJSON,
      null,
      4
    );
    // Cập nhật biến toàn cục với tên tệp đã hợp nhất
    mergedFileName = "merged_json_file.json"; // Bạn có thể thay đổi tên tệp nếu cần
  }
  
  function saveChangesmerge() {
    const updatedJson = document.getElementById("mergedJSONEditor").value;
    try {
      const parsedJson = JSON.parse(updatedJson); // Kiểm tra JSON hợp lệ
  
      const directoryPath = document.getElementById(
        "savePathInput_mergeapi"
      ).value;
  
      const currentFileName = document.getElementById(
        "savePathName_mergeapi"
      ).value;
  
      // const currentFileName = mergedFileName;
      console.log(currentFileName);
      // Đường dẫn đầy đủ đến tệp JSON trên máy chủ của bạn
      const filePath = directoryPath + "/" + currentFileName;
      console.log(filePath);
      // Gửi yêu cầu POST để lưu dữ liệu JSON vào tệp
      updateJsonFile(updatedJson, filePath);
    } catch (error) {
      alert("Invalid JSON");
    }
  }
  