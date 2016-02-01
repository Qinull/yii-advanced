/**
 * 
 */

	$(document).ready(function () {
		$("#list_records").jqGrid({
			url: "get-data-for-jqgrid",
			datatype: "json",
			mtype: "GET",
			colNames: ["缩写", "国家", "大陆", "地区"],
			colModel: [
				{ name: "Code",align:"right"},
				{ name: "Name"},
				{ name: "Continent"},
				{ name: "Region"}
			],
			pager: "#perpage",
			rowNum: 10,
			rowList: [10,20],
			sortname: "userId",
			sortorder: "asc",
			height: 'auto',
			viewrecords: true,
			gridview: true,
			caption: ""
		});		
		
		$("#list_records").setGroupHeaders({
			useColSpanStyle: true,
			groupHeaders: [
			{'numberOfColumns': 2, 'titleText': '国家信息', 'startColumnName': 'Name'},
			]
		});
		
/**
 * 以下例子不仅表头合并，数据列也可合并
 */			
//		$(document).ready(function () {
//			$("#list_records").jqGrid({
//				url: "get-data-for-jqgrid",
//				datatype: "json",
//				mtype: "GET",
//				colNames: ["缩写", "国家", "大陆", "地区"],
//				colModel: [
//					{ name: "Code",align:"right"},
//					{ name: "Name", 
//						cellattr: function (rowId, tv, rawObject, cm, rdata) {
//							if (rdata.Code == 'ABW')
//							{
//								return 'colspan=2';
//							}
//						}},
//					{ name: "Continent", 
//						cellattr: function (rowId, tv, rawObject, cm, rdata) {
//							if (rdata.Code == 'ABW')
//							{
//								return 'style="display:none;"';
//							}
//						}},
//					{ name: "Region"}
//				],
//				pager: "#perpage",
//				rowNum: 10,
//				rowList: [10,20],
//				sortname: "userId",
//				sortorder: "asc",
//				height: 'auto',
//				viewrecords: true,
//				gridview: true,
//				caption: ""
//			});
	});