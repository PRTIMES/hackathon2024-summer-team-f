export type MediaRequest = {
  title: string;
  content: string;
  purpose: string;
  category: string;
  release_kind: string;
};

export type MediaResponse = {
  id: number;
  media_kind: string;
  name: string;
  explanation: string;
  company: string;
  department: string;
  means: string;
};

export type MediaResponseArray = MediaResponse[];
