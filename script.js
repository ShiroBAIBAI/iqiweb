function showForm() {
    document.getElementById("form-popup").style.display = "block";
}

function closeForm() {
    document.getElementById("form-popup").style.display = "none";
}


// 防止默认提交行为
document.getElementById("infoForm").addEventListener("submit", function(event){
    event.preventDefault();
    
    // 获取勾选框状态
    const consentChecked = document.getElementById("consent").checked;

    if (consentChecked) {
        alert("信息已经发送给我们了，请耐心等候我们的联系。");
    } else {
        alert("表单已提交。");
    }

    // 获取表单数据
    const formData = new FormData(this);
    
    // 发送AJAX请求
    fetch('submit_to_csv.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // 提示用户提交成功
        closeForm();
        window.location.href = "index.html"; // 重定向到感谢页面
    })
    .catch(error => console.error('Error:', error));
});
