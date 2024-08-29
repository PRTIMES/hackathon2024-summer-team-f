"use client";
import { EventHandler, useState } from "react";
import { Button } from "@nextui-org/react";
import { Select, SelectItem } from "@nextui-org/react";
import { Input } from "@nextui-org/input";
import { Textarea } from "@nextui-org/input";
import { getMediaData } from "@/api/getMediaData";
import { MediaDisplay } from "@/components/MediaDisplay";
import {
  Modal,
  ModalContent,
  ModalHeader,
  ModalBody,
  ModalFooter,
  useDisclosure,
} from "@nextui-org/react";

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
  const { isOpen, onOpen, onOpenChange } = useDisclosure();

  const handleCategoryChange = (e: React.ChangeEvent<HTMLSelectElement>) => {
    setCategory(e.target.value);
  };

  const handlePurposeChange = (e: React.ChangeEvent<HTMLSelectElement>) => {
    setPurpose(e.target.value);
  };

  const handleReleaseKingChange = (e: React.ChangeEvent<HTMLSelectElement>) => {
    setReleaseKind(e.target.value);
  };

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
    console.log(requestData);

    try {
      const res = await getMediaData(requestData);
      console.log(res);
    } catch (error) {
      console.error("fail:", error);
    } finally {
      setMediaFlag(false);
      setTitle("");
      setContent("");
      setCategory("");
      setPurpose("");
      setReleaseKind("");
    }
  };

  return (
    <>
      <p className="font-bold flex justify-center mt-5 text-[30px]">
        プレスリリース作成
      </p>
      <form className="new-form flex flex-col items-center p-8 gap-6 w-full max-w-lg mx-auto">
        <div className="w-full">
          <Input
            type="text"
            value={title}
            onChange={(e) => setTitle(e.target.value)}
            placeholder="リリースタイトルを入力"
            size="lg"
            className="w-full mb-2"
          />
          <span className="text-gray-500 text-sm">{title.length} / 100</span>
        </div>
        <div className="w-full">
          <Textarea
            value={content}
            onChange={(e) => setContent(e.target.value)}
            placeholder="本文を入力"
            className="w-full mb-2"
          />
          <span className="text-gray-500 text-sm">{content.length} / 8000</span>
        </div>

        <Select
          label="目的を選択"
          className="w-full max-w-xs mb-2"
          selectedKeys={[purpose]}
          onChange={handlePurposeChange}
        >
          {purposes.map((pur) => (
            <SelectItem key={pur.name} value={pur.name}>
              {pur.name}
            </SelectItem>
          ))}
        </Select>

        <Select
          label="種類を選択"
          className="w-full max-w-xs mb-2"
          value={releaseKind}
          selectedKeys={[releaseKind]}
          onChange={handleReleaseKingChange}
        >
          {releaseKinds.map((kind) => (
            <SelectItem key={kind.name} value={kind.name}>
              {kind.name}
            </SelectItem>
          ))}
        </Select>

        <Select
          label="カテゴリを選択"
          className="w-full max-w-xs mb-2"
          selectedKeys={[category]}
          onChange={handleCategoryChange}
        >
          {categores.map((cat) => (
            <SelectItem key={cat.name} value={cat.name}>
              {cat.name}
            </SelectItem>
          ))}
        </Select>

        <Button
          className="btn-large mt-4 hover:bg-blue-700"
          color="primary"
          onPress={onOpen}
        >
          作成
        </Button>
        <Modal
          backdrop="opaque"
          isOpen={isOpen}
          onOpenChange={onOpenChange}
          classNames={{
            backdrop:
              "bg-gradient-to-t from-zinc-900 to-zinc-900/10 backdrop-opacity-20",
          }}
        >
          <ModalContent>
            {(onClose) => (
              <>
                <ModalHeader className="flex flex-col gap-1">確認</ModalHeader>
                <ModalBody>
                  <p>実行してもいいですか❓</p>
                </ModalBody>
                <ModalFooter>
                  <Button color="danger" variant="light" onPress={onClose}>
                    キャンセル
                  </Button>
                  <Button color="primary" onPress={handleMediaData}>
                    実行
                  </Button>
                </ModalFooter>
              </>
            )}
          </ModalContent>
        </Modal>
      </form>
      {mediaFlag ? <MediaDisplay /> : ""}
    </>
  );
}
