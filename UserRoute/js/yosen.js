const checkMax = 1;
const checkfirst = document.getElementsByName("first[]");

function checkCount(target) {
    let checkCount = 0;
    checkfirst.forEach(checkBox => {
    if (checkBox.checked) {
        checkCount++;
    }
    });
    if (checkCount > checkMax) {
    alert('首位通過は１組のみです。');
    target.checked = false;
    }
}

checkfirst.forEach(checkBox => {
    checkBox.addEventListener('change', () => {
    checkCount(checkBox);
    })
});





// // 1.要素の取得

// const one = document.querySelector(".one");
// const two = document.querySelector(".two");
// const three = document.querySelector(".three");
// const four = document.querySelector(".four");
// const tdall = document.querySelectorAll(".teama");

// // 2.ドラッグを開始した時、トリガーの準備
// one.addEventListener("dragstart", dragStart);
// one.addEventListener("dragend", dragEnd);

// two.addEventListener("dragstart", dragStart);
// two.addEventListener("dragend", dragEnd);

// three.addEventListener("dragstart", dragStart);
// three.addEventListener("dragend", dragEnd);

// four.addEventListener("dragstart", dragStart);
// four.addEventListener("dragend", dragEnd);

// // 4.１つ1つのempty要素を取得
// for(const one of tdall){
//     one.addEventListener("dragover", dragOver);
//     one.addEventListener("dragenter", dragEnter);
//     one.addEventListener("dragleave", dragLeave);
//     one.addEventListener("drop", dragDrop);
// }



// // 3.ドラッグ関数
// function dragStart(){
//     console.log("start");

//     setTimeout(() => {
//         one.className = "invisible";
//         // two.className = "invisible";
//         // three.className = "invisible";
//         // four.className = "invisible";
//     }, 0);
// }

// function dragEnd(){
//     console.log("end");
//     one.className = "one";
// }

// // ---------------------------------------------------
// function dragOver(e){
//     e.preventDefault();
//     console.log("over");
// }

// function dragEnter(){
//     console.log("enter");
//     this.className += "hovered";
// }

// function dragLeave(){
//     console.log("leave");
// }

// function dragDrop(){
//     console.log("drop");
//     const yet = this.className = "teama";
//     const num = [two,three,four];
//     if(yet+" "+num){
//         console.log("すでに要素が存在しています");
//     }
//     this.appendChild(one);
// }

