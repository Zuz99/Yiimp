/*
 * Yiimp Neon RGB theme for jqPlot (no backend changes)
 * Applies dark grid, neon series colors, and readable fonts.
 */
(function (window, $) {
  'use strict';

  if (!$ || !$.jqplot) return;

  var fontStack = "Inter, system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Arial, sans-serif";

  var palette = [
    "rgba(0, 229, 255, 0.95)",   // cyan
    "rgba(255, 193, 7, 0.95)",   // amber
    "rgba(0, 255, 156, 0.95)",   // neon green
    "rgba(255, 0, 212, 0.95)",   // magenta
    "rgba(160, 80, 255, 0.95)",  // purple
    "rgba(255, 84, 84, 0.95)"    // red
  ];

  // Expose for pages that want to pick consistent colors.
  window.yiimpJqplotNeon = window.yiimpJqplotNeon || {};
  window.yiimpJqplotNeon.palette = palette;
  window.yiimpJqplotNeon.pick = function (idx) {
    idx = (typeof idx === 'number') ? idx : 0;
    idx = Math.abs(idx) % palette.length;
    return palette[idx];
  };

  // Global defaults (safe: can be overridden per-plot).
  $.jqplot.config.enablePlugins = true;
  $.jqplot.config.defaultSeriesColors = palette;

  $.jqplot.config.defaultSeriesDefaults = $.extend(true, {}, $.jqplot.config.defaultSeriesDefaults, {
    lineWidth: 2.2,
    shadow: false,
    markerOptions: { shadow: false, size: 3, style: 'filledCircle' },
    rendererOptions: { smooth: true }
  });

  $.jqplot.config.defaultGrid = $.extend(true, {}, $.jqplot.config.defaultGrid, {
    background: "rgba(10, 14, 24, 0.95)",
    borderColor: "rgba(255,255,255,0.10)",
    borderWidth: 1,
    shadow: false,
    shadowWidth: 0,
    gridLineColor: "rgba(255,255,255,0.06)",
    gridLineWidth: 1
  });

  // Tick/axis labels are rendered on canvas; only enable canvas renderers if plugins are present.
  var tickOpts = {
    textColor: "rgba(235, 245, 255, 0.75)",
    fontFamily: fontStack,
    fontSize: "10px"
  };

  var labelOpts = {
    textColor: "rgba(235, 245, 255, 0.85)",
    fontFamily: fontStack,
    fontSize: "11px"
  };

  var axesDefaults = $.extend(true, {}, $.jqplot.config.defaultAxesDefaults, {
    tickOptions: tickOpts,
    labelOptions: labelOpts
  });

  if ($.jqplot.CanvasAxisTickRenderer) axesDefaults.tickRenderer = $.jqplot.CanvasAxisTickRenderer;
  if ($.jqplot.CanvasAxisLabelRenderer) axesDefaults.labelRenderer = $.jqplot.CanvasAxisLabelRenderer;

  $.jqplot.config.defaultAxesDefaults = axesDefaults;

  $.jqplot.config.defaultHighlighter = $.extend(true, {}, $.jqplot.config.defaultHighlighter, {
    show: true,
    showTooltip: true,
    tooltipLocation: 'n',
    tooltipFade: true,
    tooltipFadeSpeed: "fast",
    sizeAdjust: 6
  });

})(window, window.jQuery);
