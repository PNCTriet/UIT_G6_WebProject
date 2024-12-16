const chapterContainer =document.querySelector('.chapter-form')
let chapter=0
document.querySelector(".btn-custom").addEventListener("click",()=>{
    const lastValue = chapterContainer.children.length > 0
    ? parseInt(chapterContainer.children.length) || 0
    : 0;
    console.log(lastValue)
    const chapterForm =document.createElement('div')
    chapterForm.className ='container-box'
    chapterForm.innerHTML =`
        <span onclick="removeChapter(this)" class="close-icon">&times;</span>
        <div class="mb-3">
            <label class="form-label">Phân chương</label>
            <div class="input-group">
                <input type="number" value="${lastValue+1}" class="form-control">
                <span class="input-group-text">0/14</span>
            </div>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Upload ảnh</label>
            <div class="input-group">
                <input type="file" class="form-control upload-img" name="chapter${chapter}[]" multiple>
                <div class="icon-buttons">
                    <i class="bi bi-arrows-move"></i>
                    <i class="bi bi-trash"></i>
                </div>
            </div>
        </div>
    `
    chapterContainer.appendChild(chapterForm)
    chapter+=1
   
})

function removeChapter(button) {
    const form = button.closest('.container-box');
    if (form) {
        chapterContainer.removeChild(form);
    }
}