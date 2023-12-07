/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import {
  useBlockProps,
  RichText,
  InspectorControls,
  PanelColorSettings,
  InnerBlocks,
} from "@wordpress/block-editor";

import { RangeControl, PanelBody, SelectControl } from "@wordpress/components";
import NumberControl from "./components/number-control";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import "./editor.scss";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
  const ALLOWED_BLOCKS = ["core/heading", "core/paragraph", "core/image"];

  const TEMPLATE_PARAGRAPHS = [
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin finibus, lectus non interdum cursus, arcu sapien mollis lacus, et tincidunt odio nisi ut purus. Duis eleifend, magna placerat faucibus tincidunt, orci nulla ornare tortor, eget egestas tortor nunc quis sem. Cras in tortor justo. Nulla consectetur leo vel blandit consectetur. Fusce quis sapien ante. Vestibulum non varius augue, et ultricies urna. Integer hendrerit suscipit nibh.",
    "Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras vestibulum mauris diam. Praesent semper diam a efficitur iaculis. Nullam lacinia augue quis lorem accumsan tempus. Maecenas dapibus velit eu blandit pretium. Nullam posuere ut ipsum in commodo. Fusce fringilla quis turpis a placerat. Etiam hendrerit velit a lacus varius ornare.",
  ];
  const MC_TEMPLATE = [
    ["core/heading", { level: 2, placeholder: "Heading..." }],
    ["core/paragraph", { placeholder: TEMPLATE_PARAGRAPHS[0] }],
    ["core/heading", { level: 4, placeholder: "Sub-heading..." }],
    ["core/paragraph", { placeholder: TEMPLATE_PARAGRAPHS[1] }],
  ];
  const {
    columnCount,
    columnWidth,
    columnGap,
    columnRuleStyle,
    columnRuleWidth,
    columnRuleColor,
  } = attributes;
  const columnStyles = {
    columnCount,
    columnWidth,
    columnGap,
    columnRuleStyle,
    columnRuleWidth,
    columnRuleColor,
  };

  const onChangeColumnCount = val => {
    setAttributes({ columnCount: val });
  };

  const onChangeColumnWidth = val => {
    setAttributes({ columnWidth: Number(val) });
  };

  const onChangeColumnGap = val => {
    setAttributes({ columnGap: Number(val) });
  };

  const onChangeColumnRuleStyle = val => {
    setAttributes({ columnRuleStyle: val });
  };

  const onChangeColumnRuleWidth = val => {
    setAttributes({ columnRuleWidth: Number(val) });
  };

  const onChangeColumnRuleColor = val => {
    setAttributes({ columnRuleColor: val });
  };

  return (
    <>
      <InspectorControls>
        <PanelBody title={__("Column Settings", "newspaper-block")}>
          <RangeControl
            label="Columns"
            value={attributes.columnCount}
            onChange={onChangeColumnCount}
            min={2}
            max={6}
          />
          <NumberControl
            label={__("Width", "newspaper-block")}
            value={columnWidth}
            onChange={onChangeColumnWidth}
            min={120}
            max={500}
            step={10}
          />
          <NumberControl
            label="Gap"
            onChange={onChangeColumnGap}
            value={columnGap}
            min={10}
            max={100}
          />
        </PanelBody>
        <PanelBody title="Column Separator" initialOpen={false}>
          <SelectControl
            label="Separator Style"
            onChange={onChangeColumnRuleStyle}
            value={columnRuleStyle}
            options={[
              {
                label: "None",
                value: "none",
              },
              {
                label: "Solid",
                value: "solid",
              },
              {
                label: "Dotted",
                value: "dotted",
              },
              {
                label: "Dashed",
                value: "dashed",
              },
              {
                label: "Double",
                value: "double",
              },
              {
                label: "Groove",
                value: "groove",
              },
              {
                label: "Ridge",
                value: "ridge",
              },
            ]}
          />
          <NumberControl
            label="Width"
            onChange={onChangeColumnRuleWidth}
            value={columnRuleWidth}
            min={1}
            max={8}
          />
        </PanelBody>
        <PanelColorSettings
          title="Colour settings"
          colorSettings={[
            {
              label: "Separator colour",
              value: columnRuleColor,
              onChange: onChangeColumnRuleColor,
            },
          ]}></PanelColorSettings>
      </InspectorControls>
      <div {...useBlockProps({ style: columnStyles })}>
        <InnerBlocks allowedBlocks={ALLOWED_BLOCKS} template={MC_TEMPLATE} />
      </div>
    </>
  );
}
