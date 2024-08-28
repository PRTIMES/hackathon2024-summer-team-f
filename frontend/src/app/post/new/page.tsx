"use client";
import { useState } from "react";
import { Button } from "@nextui-org/react";
import { Select, SelectItem } from "@nextui-org/react";
import { Input } from "@nextui-org/input";
import { Textarea } from "@nextui-org/input";
import { getMediaData } from "@/api/getMediaData";
import { MediaDisplay } from "@/components/MediaDisplay";

const categores = [{ name: "パソコン" }, { name: "ネットサービス" }];

const purposes = [{ name: "マーケティング" }, { name: "イベント" }];

const releaseKinds = [{ name: "マーケティング" }, { name: "イベント" }];

export default function New() {
  const [title, setTitle] = useState("");
  const [content, setContent] = useState("");
  const [category, setCategory] = useState("");
  const [purpose, setPurpose] = useState("");
  const [releaseKind, setReleaseKind] = useState("");
  const [mediaFlag, setMediaFlag] = useState(false);
  const handleMediaData = async () => {
    setMediaFlag(true);

    //TODO
    const requestData = {
      title,
      content,
      purpose,
      category,
      releaseKind,
    };
    const res = await getMediaData(requestData);
    console.log(res);
  };
  return (
    <>
      <p className="font-bold flex justify-center mt-5 text-[30px]">プレスリリース作成</p>
      <form className="new-form flex flex-col items-center p-8 gap-6 w-full max-w-lg mx-auto">
        <div className="w-full">
          <Input type="text" value={title} onChange={(e) => setTitle(e.target.value)} placeholder="リリースタイトルを入力" size="lg" className="w-full mb-2" />
          <span className="text-gray-500 text-sm">{title.length} / 100</span>
        </div>
        <div className="w-full">
          <Textarea value={content} onChange={(e) => setContent(e.target.value)} placeholder="本文を入力" className="w-full mb-2" />
          <span className="text-gray-500 text-sm">{content.length} / 8000</span>
        </div>

        <Select label="目的を選択" className="w-full max-w-xs mb-2" value={purpose} onChange={(e) => setPurpose(e.target.value)}>
          {purposes.map((pur) => (
            <SelectItem key={pur.name} value={pur.name}>
              {pur.name}
            </SelectItem>
          ))}
        </Select>

        <Select label="種類を選択" className="w-full max-w-xs mb-2" value={releaseKind} onChange={(e) => setReleaseKind(e.target.value)}>
          {releaseKinds.map((kind) => (
            <SelectItem key={kind.name} value={kind.name}>
              {kind.name}
            </SelectItem>
          ))}
        </Select>

        <Select label="カテゴリを選択" className="w-full max-w-xs mb-2" value={category} onChange={(e) => setCategory(e.target.value)}>
          {categores.map((cat) => (
            <SelectItem key={cat.name} value={cat.name}>
              {cat.name}
            </SelectItem>
          ))}
        </Select>

        <Button className="btn-large mt-4 hover:bg-blue-700" color="primary" onClick={handleMediaData}>
          作成
        </Button>
      </form>
      {mediaFlag ? <MediaDisplay /> : ""}
    </>
  );
}
