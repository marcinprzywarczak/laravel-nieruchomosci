/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunk"] = self["webpackChunk"] || []).push([["/js/properties"],{

/***/ "./resources/js/properties.js":
/*!************************************!*\
  !*** ./resources/js/properties.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

eval("__webpack_require__(/*! datatables.net-bs5 */ \"./node_modules/datatables.net-bs5/js/dataTables.bootstrap5.js\");\n\n$(function () {\n  $('table').DataTable({\n    ajax: {\n      url: 'properties/datatable',\n      type: 'POST',\n      headers: {\n        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n      }\n    },\n    columns: [{\n      data: 'id',\n      name: 'id'\n    }, {\n      data: 'address',\n      name: 'address'\n    }, {\n      data: 'area_square_meters',\n      name: 'area_square_meters'\n    }, {\n      data: 'rooms',\n      name: 'rooms'\n    }, {\n      data: 'floor',\n      name: 'floor'\n    }, {\n      data: 'number_of_floor',\n      name: 'number_of_floor'\n    }, {\n      data: 'description',\n      name: 'description'\n    }, {\n      data: 'created_at',\n      name: 'created_at'\n    }, {\n      data: 'updated_at',\n      name: 'updated_at'\n    }, {\n      data: 'deleted_at',\n      name: 'deleted_at'\n    }, {\n      data: 'action',\n      name: 'action',\n      orderable: false,\n      searchable: false\n    }],\n    language: {\n      \"url\": \"vendor/datatables/i18n/\" + config.locale + \".json\"\n    },\n    processing: true,\n    serverSide: true,\n    pageLength: 10,\n    lengthMenu: [[10, 50, 100, 200], [10, 50, 100, 200]],\n    stateSave: true,\n    stateDuration: 604800\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcHJvcGVydGllcy5qcy5qcyIsIm1hcHBpbmdzIjoiQUFBQUEsbUJBQU8sQ0FBQyx5RkFBRCxDQUFQOztBQUVBQyxDQUFDLENBQUMsWUFDRjtBQUNJQSxFQUFBQSxDQUFDLENBQUMsT0FBRCxDQUFELENBQVdDLFNBQVgsQ0FDSTtBQUNJQyxJQUFBQSxJQUFJLEVBQUM7QUFDREMsTUFBQUEsR0FBRyxFQUFFLHNCQURKO0FBRURDLE1BQUFBLElBQUksRUFBRSxNQUZMO0FBR0RDLE1BQUFBLE9BQU8sRUFDUDtBQUNJLHdCQUFnQkwsQ0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJNLElBQTdCLENBQWtDLFNBQWxDO0FBRHBCO0FBSkMsS0FEVDtBQVNJQyxJQUFBQSxPQUFPLEVBQ1AsQ0FDSTtBQUFDQyxNQUFBQSxJQUFJLEVBQUUsSUFBUDtBQUFhQyxNQUFBQSxJQUFJLEVBQUU7QUFBbkIsS0FESixFQUVJO0FBQUNELE1BQUFBLElBQUksRUFBRSxTQUFQO0FBQWtCQyxNQUFBQSxJQUFJLEVBQUU7QUFBeEIsS0FGSixFQUdJO0FBQUNELE1BQUFBLElBQUksRUFBRSxvQkFBUDtBQUE2QkMsTUFBQUEsSUFBSSxFQUFFO0FBQW5DLEtBSEosRUFJSTtBQUFDRCxNQUFBQSxJQUFJLEVBQUUsT0FBUDtBQUFnQkMsTUFBQUEsSUFBSSxFQUFFO0FBQXRCLEtBSkosRUFLSTtBQUFDRCxNQUFBQSxJQUFJLEVBQUUsT0FBUDtBQUFnQkMsTUFBQUEsSUFBSSxFQUFFO0FBQXRCLEtBTEosRUFNSTtBQUFDRCxNQUFBQSxJQUFJLEVBQUUsaUJBQVA7QUFBMEJDLE1BQUFBLElBQUksRUFBRTtBQUFoQyxLQU5KLEVBT0k7QUFBQ0QsTUFBQUEsSUFBSSxFQUFFLGFBQVA7QUFBc0JDLE1BQUFBLElBQUksRUFBRTtBQUE1QixLQVBKLEVBUUk7QUFBQ0QsTUFBQUEsSUFBSSxFQUFFLFlBQVA7QUFBcUJDLE1BQUFBLElBQUksRUFBRTtBQUEzQixLQVJKLEVBU0k7QUFBQ0QsTUFBQUEsSUFBSSxFQUFFLFlBQVA7QUFBcUJDLE1BQUFBLElBQUksRUFBRTtBQUEzQixLQVRKLEVBVUk7QUFBQ0QsTUFBQUEsSUFBSSxFQUFFLFlBQVA7QUFBcUJDLE1BQUFBLElBQUksRUFBRTtBQUEzQixLQVZKLEVBV0k7QUFBQ0QsTUFBQUEsSUFBSSxFQUFFLFFBQVA7QUFBaUJDLE1BQUFBLElBQUksRUFBRSxRQUF2QjtBQUFpQ0MsTUFBQUEsU0FBUyxFQUFFLEtBQTVDO0FBQW1EQyxNQUFBQSxVQUFVLEVBQUU7QUFBL0QsS0FYSixDQVZKO0FBdUJJQyxJQUFBQSxRQUFRLEVBQ1I7QUFDSSxhQUFPLDRCQUE0QkMsTUFBTSxDQUFDQyxNQUFuQyxHQUE0QztBQUR2RCxLQXhCSjtBQTJCSUMsSUFBQUEsVUFBVSxFQUFFLElBM0JoQjtBQTRCSUMsSUFBQUEsVUFBVSxFQUFFLElBNUJoQjtBQTZCSUMsSUFBQUEsVUFBVSxFQUFFLEVBN0JoQjtBQThCSUMsSUFBQUEsVUFBVSxFQUFFLENBQUMsQ0FBQyxFQUFELEVBQUksRUFBSixFQUFPLEdBQVAsRUFBVyxHQUFYLENBQUQsRUFBa0IsQ0FBQyxFQUFELEVBQUssRUFBTCxFQUFTLEdBQVQsRUFBYyxHQUFkLENBQWxCLENBOUJoQjtBQStCSUMsSUFBQUEsU0FBUyxFQUFFLElBL0JmO0FBZ0NJQyxJQUFBQSxhQUFhLEVBQUU7QUFoQ25CLEdBREo7QUFvQ0gsQ0F0Q0EsQ0FBRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9wcm9wZXJ0aWVzLmpzPzg1MTMiXSwic291cmNlc0NvbnRlbnQiOlsicmVxdWlyZSgnZGF0YXRhYmxlcy5uZXQtYnM1Jyk7XHJcblxyXG4kKGZ1bmN0aW9uICgpXHJcbntcclxuICAgICQoJ3RhYmxlJykuRGF0YVRhYmxlKFxyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgYWpheDp7XHJcbiAgICAgICAgICAgICAgICB1cmw6ICdwcm9wZXJ0aWVzL2RhdGF0YWJsZScsXHJcbiAgICAgICAgICAgICAgICB0eXBlOiAnUE9TVCcsXHJcbiAgICAgICAgICAgICAgICBoZWFkZXJzOlxyXG4gICAgICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgICAgICdYLUNTUkYtVE9LRU4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIGNvbHVtbnM6XHJcbiAgICAgICAgICAgIFtcclxuICAgICAgICAgICAgICAgIHtkYXRhOiAnaWQnLCBuYW1lOiAnaWQnfSxcclxuICAgICAgICAgICAgICAgIHtkYXRhOiAnYWRkcmVzcycsIG5hbWU6ICdhZGRyZXNzJ30sXHJcbiAgICAgICAgICAgICAgICB7ZGF0YTogJ2FyZWFfc3F1YXJlX21ldGVycycsIG5hbWU6ICdhcmVhX3NxdWFyZV9tZXRlcnMnfSxcclxuICAgICAgICAgICAgICAgIHtkYXRhOiAncm9vbXMnLCBuYW1lOiAncm9vbXMnfSxcclxuICAgICAgICAgICAgICAgIHtkYXRhOiAnZmxvb3InLCBuYW1lOiAnZmxvb3InfSxcclxuICAgICAgICAgICAgICAgIHtkYXRhOiAnbnVtYmVyX29mX2Zsb29yJywgbmFtZTogJ251bWJlcl9vZl9mbG9vcid9LFxyXG4gICAgICAgICAgICAgICAge2RhdGE6ICdkZXNjcmlwdGlvbicsIG5hbWU6ICdkZXNjcmlwdGlvbid9LFxyXG4gICAgICAgICAgICAgICAge2RhdGE6ICdjcmVhdGVkX2F0JywgbmFtZTogJ2NyZWF0ZWRfYXQnfSxcclxuICAgICAgICAgICAgICAgIHtkYXRhOiAndXBkYXRlZF9hdCcsIG5hbWU6ICd1cGRhdGVkX2F0J30sXHJcbiAgICAgICAgICAgICAgICB7ZGF0YTogJ2RlbGV0ZWRfYXQnLCBuYW1lOiAnZGVsZXRlZF9hdCd9LFxyXG4gICAgICAgICAgICAgICAge2RhdGE6ICdhY3Rpb24nLCBuYW1lOiAnYWN0aW9uJywgb3JkZXJhYmxlOiBmYWxzZSwgc2VhcmNoYWJsZTogZmFsc2V9LFxyXG4gICAgICAgICAgICBdLFxyXG4gICAgICAgICAgICBsYW5ndWFnZTogXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIFwidXJsXCI6IFwidmVuZG9yL2RhdGF0YWJsZXMvaTE4bi9cIiArIGNvbmZpZy5sb2NhbGUgKyBcIi5qc29uXCJcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgcHJvY2Vzc2luZzogdHJ1ZSxcclxuICAgICAgICAgICAgc2VydmVyU2lkZTogdHJ1ZSxcclxuICAgICAgICAgICAgcGFnZUxlbmd0aDogMTAsXHJcbiAgICAgICAgICAgIGxlbmd0aE1lbnU6IFtbMTAsNTAsMTAwLDIwMF0sIFsxMCwgNTAsIDEwMCwgMjAwXV0sXHJcbiAgICAgICAgICAgIHN0YXRlU2F2ZTogdHJ1ZSxcclxuICAgICAgICAgICAgc3RhdGVEdXJhdGlvbjogNjA0ODAwXHJcbiAgICAgICAgfVxyXG4gICAgKVxyXG59KSJdLCJuYW1lcyI6WyJyZXF1aXJlIiwiJCIsIkRhdGFUYWJsZSIsImFqYXgiLCJ1cmwiLCJ0eXBlIiwiaGVhZGVycyIsImF0dHIiLCJjb2x1bW5zIiwiZGF0YSIsIm5hbWUiLCJvcmRlcmFibGUiLCJzZWFyY2hhYmxlIiwibGFuZ3VhZ2UiLCJjb25maWciLCJsb2NhbGUiLCJwcm9jZXNzaW5nIiwic2VydmVyU2lkZSIsInBhZ2VMZW5ndGgiLCJsZW5ndGhNZW51Iiwic3RhdGVTYXZlIiwic3RhdGVEdXJhdGlvbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/properties.js\n");

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["/js/vendor"], () => (__webpack_exec__("./resources/js/properties.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);