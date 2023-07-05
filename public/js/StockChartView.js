class StockChartView {
    constructor() {
        
    }

    // 즐겨찾기 테이블 View
    bookmarkSection() {
        const view = `<div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0">주식 차트</h6>
                        <input id="autoComplete" type="search" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off" maxlength="2048" tabindex="1">
                    </div>
                    <div class="table-responsive">
                        <div id="chartContainer">

                        </div>
                    </div>`;
    }

    // // 주식 리스트 가져오기
    // async getStockList() {
    //     // const autoCompleteJS = new AutoComplete("#autoComplete");
    //     //Callback
    //     base.sendXhr("/stock/getList", formData, true).onload = () => {
    //         if(base.xhr.readyState === base.xhr.DONE){  
    //             if (base.xhr.status == 200) {
    //                 if(base.xhr.response) {
    //                     this.setChartData(base.xhr.response);
    //                     if(!this.isRender) {
    //                         this.setChart();
    //                     }
    //                 }
    //             } else if (base.xhr.status == 422) {
    //                 setErrorMsg(base.xhr.response);
    //             } else {
    //                 //failed
    //                 alert("알 수 없는 오류가 발생했습니다.\n다시 한번 시도해주세요.");
    //             }

    //             this.updateChart();
    //         }
    //     }
    // }

    // // 주식 데이터 가져오기
    // async getStockData(stock = "") {
    //     if(stock && this.stock !== stock)
    //         this.stock = stock;

    //     const formData = new FormData();
    //     formData.append('name', this.stockCode);
    //     formData.append('startDate', this.loadDate);
        
    //     //Callback
    //     base.sendXhr("/stock/getChartData", formData, true).onload = () => {
    //         if(base.xhr.readyState === base.xhr.DONE){  
    //             if (base.xhr.status == 200) {
    //                 if(base.xhr.response) {
    //                     this.setChartData(base.xhr.response);
    //                     if(!this.isRender) {
    //                         this.setCandleChart();
    //                     }
    //                 }
    //             } else if (base.xhr.status == 422) {
    //                 setErrorMsg(base.xhr.response);
    //             } else {
    //                 //failed
    //                 alert("알 수 없는 오류가 발생했습니다.\n다시 한번 시도해주세요.");
    //             }

    //             this.updateChart();
    //         }
    //     }
    // }

    // setChartData(object) {
    //     for (const data in object) {
    //         const date = new Date(parseInt(data));
    //         this.dps1.push({x: date, y: [Number(object[data]['Open']), Number(object[data]['High']), Number(object[data]['Low']), Number(object[data]['Close'])]});
    //         this.dps2.push({x: date, y: Number(object[data]['Close'])});

    //         if(!this.loadDate) {
    //             this.loadDate = date;
    //         } else {
    //             if(this.loadDate < date) {
    //                 this.loadDate = date;
    //             }
    //         }
    //     }
    // }
}