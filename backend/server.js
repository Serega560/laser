import express from "express";
import cors from "cors";
import multer from "multer";
import nodemailer from "nodemailer";
import fs from "fs";

const app = express();
const upload = multer({ dest: "uploads/" });

app.use(cors());
app.use(express.json());

app.post("/send", upload.single("file"), async (req, res) => {
    try {
        const { name, contact, comment } = req.body;
        const file = req.file;

        const transporter = nodemailer.createTransport({
            service: "gmail",
            auth: {
                user: process.env.EMAIL_USER, // Берём из переменных окружения
                pass: process.env.EMAIL_PASS  // Берём из переменных окружения
            }
        });

        await transporter.sendMail({
            from: `"Форма сайта" <${process.env.EMAIL_USER}>`,
            to: process.env.EMAIL_TO || process.env.EMAIL_USER,
            subject: "Новая заявка с сайта",
            text: `Имя: ${name}\nКонтакт: ${contact}\nКомментарий: ${comment}`,
            attachments: file
                ? [
                    {
                        filename: file.originalname,
                        path: file.path
                    }
                ]
                : []
        });

        if (file) fs.unlinkSync(file.path);

        res.json({ status: "ok" });
    } catch (err) {
        console.error(err);
        res.status(500).json({ status: "error", error: err.message });
    }
});

// Heroku сам даст порт через process.env.PORT
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(`Сервер запущен на порту ${PORT}`));
