import { Meta, StoryObj } from "@storybook/react";
import { Button } from "./button";

const meta = {
  title: "Main/Button",
  component: Button,
  tags: ["autodocs"],
  parameters: {
    layout: "centered",
  },
  argTypes: {},
  args: {},
} satisfies Meta<typeof Button>;

type Story = StoryObj<typeof meta>;

export const Primary: Story = {
  args: {
    children: "Primary",
    appName: "Primary",
  },
};

export default meta;
